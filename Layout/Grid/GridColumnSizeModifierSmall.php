<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

/**
 * The viewport width media query at which the grid takes effect, and number of columns.
 */
enum GridColumnSizeModifierSmall implements GridColumnSizeModifierInterface {

  case Small2;

  /**
   * Combined in grid.twig to produce a size class.
   */
  public function classPart(): string {
    return match ($this) {
      self::Small2 => 'sm-2',
    };
  }

}
