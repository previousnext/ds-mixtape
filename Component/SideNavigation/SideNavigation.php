<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SideNavigation;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Vo\MenuTree\MenuTrees;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('side-navigation.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'parentLink', new: 'parent')]
#[Slots\Attribute\RenameSlot(original: 'menuTrees', new: 'items')]
#[Scenarios([CommonComponent\SideNavigation\SideNavigationScenarios::class])]
class SideNavigation extends CommonComponent\SideNavigation\SideNavigation implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  #[\Override]
  protected function setActiveTrail(MenuTrees $links): void {
    // For Mixtape, only the last/deepest:
    // CSS uses :is/:has, not explicit classes, to add styling to intermediate links.
    $links->last()->link->current = TRUE;
  }

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('id', $this->id)
      // Title is unused by Mixtape...
      ->set('title', NULL)
      ->set('menuTrees', $this->toArray())
      ->set('parentLink', $this->parentLink);
  }

}
