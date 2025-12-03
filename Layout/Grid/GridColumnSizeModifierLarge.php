<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

/**
 * The viewport width media query at which the grid takes effect, and number of columns.
 */
enum GridColumnSizeModifierLarge implements GridColumnSizeModifierInterface {

  case Large2;
  case Large3;
  case Large4;

  /**
   * Combined in grid.twig to produce a size class.
   */
  public function classPart(): string {
    return match ($this) {
      self::Large2 => 'lg-2',
      self::Large3 => 'lg-3',
      self::Large4 => 'lg-4',
    };
  }

}
