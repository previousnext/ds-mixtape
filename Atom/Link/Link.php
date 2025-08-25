<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Link;

use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios(scenarios: [
  CommonAtoms\Link\LinkScenarios::class,
])]
class Link extends CommonAtoms\Link\Link implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  /**
   * @phpstan-param mixed ...$args
   */
  protected static function constructInstance(...$args): static {
    $instance = parent::constructInstance(...$args);

    if ($instance->more && $instance->iconEnd instanceof CommonAtoms\DefaultInstance) {
      $instance->iconEnd = CommonAtoms\Icon\Icon::create('arrow-right');
    }

    if ($instance->download && $instance->iconStart instanceof CommonAtoms\DefaultInstance) {
      $instance->iconStart = CommonAtoms\Icon\Icon::create('download');
    }

    return $instance;
  }

}
