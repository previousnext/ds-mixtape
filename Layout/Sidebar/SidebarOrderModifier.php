<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Sidebar;

use PreviousNext\Ds\Common\Layout\Sidebar\SidebarModifierInterface;

/**
 * @todo enum names could be better.
 */
enum SidebarOrderModifier implements SidebarModifierInterface {

  case Rev;
  case RevLg;

  /**
   * Combined in sidebar.twig to produce a class like mx-grid--CLASSPART.
   */
  public function classPart(): string {
    return match ($this) {
      self::Rev => 'sidebar-rev',
      self::RevLg => 'sidebar-rev-lg',
    };
  }

}
