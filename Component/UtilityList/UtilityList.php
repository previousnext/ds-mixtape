<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\UtilityList;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css(path: 'popover.css', preprocess: TRUE)]
#[Asset\Css(path: 'utility-list.css', preprocess: TRUE)]
#[Asset\Js('utility-list.entry.js', preprocess: TRUE, attributes: ['type' => 'module'])]
#[Slots\Attribute\RenameSlot(original: 'direction', new: 'horizontal')]
#[Slots\Attribute\RenameSlot(original: 'hasCopy', new: 'copy')]
#[Slots\Attribute\RenameSlot(original: 'hasPrint', new: 'print')]
#[Slots\Attribute\RenameSlot(original: 'hasPdf', new: 'pdf')]
#[Slots\Attribute\ModifySlots(add: ['share'])]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([
  CommonComponent\UtilityList\UtilityListScenarios::class,
  UtilityListScenarios::class,
])]
class UtilityList extends CommonComponent\UtilityList\UtilityList implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  public CommonComponent\SocialShare\SocialShare $socialShare;

  /**
   * @phpstan-param mixed ...$args
   */
  protected static function constructInstance(...$args): static {
    /** @var static $instance */
    $instance = parent::constructInstance(...$args);
    $instance->socialShare = CommonComponent\SocialShare\SocialShare::create();
    return $instance;
  }

  protected function build(Slots\Build $build): Slots\Build {
    // This is a bit messy, if we make PHP 8.4 min we can use ghosts to conditionally hydrate an object
    // and use its existence as the condition rather than these:
    $hasShareSheet = \count($this->socialShare) > 0;

    return parent::build($build)
      ->set('direction', $this->direction === CommonComponent\UtilityList\UtilityListDirection::Horizontal)
      ->set('hasCopy', $this->hasCopy)
      ->set('hasPrint', $this->hasPrint)
      ->set('hasPdf', $this->hasPdf)
      ->set('share', $hasShareSheet ? $this->socialShare : NULL);
  }

}
