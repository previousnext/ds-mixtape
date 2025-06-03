<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Icon;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtom;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('icon.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([IconScenarios::class])]
class Icon extends CommonAtom\Icon\Icon implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    $iconEnum = $this->modifiers->getFirstInstanceOf(Icons::class);
    if ($this->icon !== '' && $iconEnum !== NULL) {
      throw new \LogicException('An icon should not have both an icon as a string and a icon as a modifier. Choose one, preferably a modifier.');
    }

    $iconSizeEnum = $this->modifiers->getFirstInstanceOf(IconSize::class);
    if ($iconSizeEnum !== NULL) {
      $this->containerAttributes['class'][] = $iconSizeEnum->className();
    }

    return $build
      ->set('icon', $iconEnum?->className() ?? $this->icon)
      ->set('text', $this->text)
      ->set('alignmentType', NULL)
      ->set('containerAttributes', $this->containerAttributes);
  }

  public static function createMixtapeIcon(Icons $icon, IconSize $iconSize = IconSize::Medium): static {
    /** @var static */
    $i = CommonAtom\Icon\Icon::create();
    $i->modifiers[] = $icon;
    $i->modifiers[] = $iconSize;
    return $i;
  }

}
