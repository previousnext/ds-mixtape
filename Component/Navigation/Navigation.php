<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Navigation;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('navigation.css', preprocess: FALSE)]
#[Asset\Js('navigation.entry.js', preprocess: FALSE, attributes: ['type' => 'module'])]
#[Asset\Js('drop-menu.entry.js', preprocess: FALSE, attributes: ['type' => 'module'])]
#[Slots\Attribute\RenameSlot(original: 'menuTrees', new: 'items')]
#[Scenarios([CommonComponent\Navigation\NavigationScenarios::class])]
#[Slots\Attribute\ModifySlots(add: [
  // @todo does this need to be in common?
  new Slots\Slot('navigationType'),
])]
#[Slots\Attribute\RenameSlot(original: 'navigationType', new: 'type')]
class Navigation extends CommonComponent\Navigation\Navigation implements Utility\MixtapeObjectInterface {

  // @todo this Mixtape component might need to be rethough as navigationType is required.
  use Utility\ObjectTrait;

  public NavigationType $navigationType;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('navigationType', ($this->navigationType ?? NavigationType::Footer)->typeName());
  }

}
