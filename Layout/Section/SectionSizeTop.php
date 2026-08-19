<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

enum SectionSizeTop implements SectionSizeInterface {

  case S;
  case M;
  case L;
  case XL;

  /**
   * Suffix for `mx-section--`.
   */
  public function modifierName(): string {
    return match ($this) {
      static::S => 'top-s',
      static::M => 'top-m',
      static::L => 'top-l',
      static::XL => 'top-xl',
    };
  }

}
