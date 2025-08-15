<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

use PreviousNext\Ds\Common\Layout\Section\SectionModifierInterface;

enum SectionSize implements SectionModifierInterface {

  case S;
  case M;
  case L;
  case XL;
  case TopS;
  case TopM;
  case TopL;
  case TopXL;
  case BottomS;
  case BottomM;
  case BottomL;
  case BottomXL;

  /**
   * Suffix for `mx-section--`.
   */
  public function modifierName(): string {
    return match ($this) {
      static::S => 's',
      static::M => 'm',
      static::L => 'l',
      static::XL => 'xl',
      static::TopS => 'top-s',
      static::TopM => 'top-m',
      static::TopL => 'top-l',
      static::TopXL => 'top-xl',
      static::BottomS => 'bottom-s',
      static::BottomM => 'bottom-m',
      static::BottomL => 'bottom-l',
      static::BottomXL => 'bottom-xl',
    };
  }

}
