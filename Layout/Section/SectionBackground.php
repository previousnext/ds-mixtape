<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

use PreviousNext\Ds\Common\Layout\Section\SectionModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum SectionBackground implements SectionModifierInterface {

  case Reset;
  case Alt;
  case Primary;
  case Accent;
  case Reverse;

  /**
   * Suffix for `mx-background--`.
   *
   * See section.twig.
   */
  public function modifierName(): string {
    return match ($this) {
      static::Reset => 'reset',
      static::Alt => 'alt',
      static::Primary => 'primary',
      static::Accent => 'accent',
      static::Reverse => 'reverse',
    };
  }

}
