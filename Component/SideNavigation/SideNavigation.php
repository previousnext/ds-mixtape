<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SideNavigation;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('side-navigation.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'parentLink', new: 'parent')]
#[Slots\Attribute\RenameSlot(original: 'menuTrees', new: 'items')]
#[Scenarios([CommonComponent\SideNavigation\SideNavigationScenarios::class])]
class SideNavigation extends CommonComponent\SideNavigation\SideNavigation implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('id', $this->id)
      // Title is unused by Mixtape...
      ->set('title', NULL)
      ->set('menuTrees', $this->toArray())
      ->set('parentLink', $this->parentLink);
  }

}
