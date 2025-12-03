<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

/**
 * The viewport width media query at which the grid takes effect, and number of columns.
 */
enum GridColumnSizeModifierExtraLarge implements GridColumnSizeModifierInterface {

  case ExtraLarge2;
  case ExtraLarge3;
  case ExtraLarge4;

  /**
   * Combined in grid.twig to produce a size class.
   */
  public function classPart(): string {
    return match ($this) {
      self::ExtraLarge2 => 'xl-2',
      self::ExtraLarge3 => 'xl-3',
      self::ExtraLarge4 => 'xl-4',
    };
  }

}
