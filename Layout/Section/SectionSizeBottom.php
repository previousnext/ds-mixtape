<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

enum SectionSizeBottom implements SectionSizeInterface {

  case S;
  case M;
  case L;
  case XL;

  /**
   * Suffix for `mx-section--`.
   */
  public function modifierName(): string {
    return match ($this) {
      static::S => 'bottom-s',
      static::M => 'bottom-m',
      static::L => 'bottom-l',
      static::XL => 'bottom-xl',
    };
  }

}
