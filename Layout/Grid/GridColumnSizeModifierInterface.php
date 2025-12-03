<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

use PreviousNext\Ds\Common\Layout\Grid\GridModifierInterface;

/**
 * The viewport width media query at which the grid takes effect, and number of columns.
 */
interface GridColumnSizeModifierInterface extends GridModifierInterface {

  /**
   * Combined in grid.twig to produce a size class.
   */
  public function classPart(): string;

}
