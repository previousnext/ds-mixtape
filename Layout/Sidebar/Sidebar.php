<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Sidebar;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('sidebar.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\RenameSlot(original: 'sidebar', new: 'sidebarContent')]
#[Slots\Attribute\RenameSlot(original: 'sidebarPosition', new: 'before')]
#[Scenarios([CommonLayouts\Sidebar\SidebarScenarios::class])]
class Sidebar extends CommonLayouts\Sidebar\Sidebar implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('contentAttributes', $this->contentAttributes)
      ->set('sidebarAttributes', $this->sidebarAttributes);
  }

}
