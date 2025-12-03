<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

/**
 * The viewport width media query at which the grid takes effect, and number of columns.
 */
enum GridColumnSizeModifierMedium implements GridColumnSizeModifierInterface {

  case Medium2;
  case Medium3;
  case Medium4;

  /**
   * Combined in grid.twig to produce a size class.
   */
  public function classPart(): string {
    return match ($this) {
      self::Medium2 => 'md-2',
      self::Medium3 => 'md-3',
      self::Medium4 => 'md-4',
    };
  }

}
