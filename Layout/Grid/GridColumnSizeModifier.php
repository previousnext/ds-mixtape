<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

use PreviousNext\Ds\Common\Layout\Grid\GridModifierInterface;

/**
 * Size modifier.
 */
enum GridColumnSizeModifier implements GridModifierInterface {
  case ExtraLarge2;
  case ExtraLarge3;
  case ExtraLarge4;
  case ExtraSmall2;
  case Large2;
  case Large3;
  case Large4;
  case Medium2;
  case Medium3;
  case Medium4;
  case Small2;

  /**
   * Combined in grid.twig to produce a size class.
   */
  public function classPart(): string {
    return match ($this) {
      self::ExtraLarge2 => 'xl-2',
      self::ExtraLarge3 => 'xl-3',
      self::ExtraLarge4 => 'xl-4',
      self::ExtraSmall2 => 'xs-2',
      self::Large2 => 'lg-2',
      self::Large3 => 'lg-3',
      self::Large4 => 'lg-4',
      self::Medium2 => 'md-2',
      self::Medium3 => 'md-3',
      self::Medium4 => 'md-4',
      self::Small2 => 'sm-2',
    };
  }

}
