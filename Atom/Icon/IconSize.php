<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Icon;

use PreviousNext\Ds\Common\Atom\Icon\IconModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum IconSize implements IconModifierInterface {

  case Small;
  case Medium;
  case Large;
  case ExtraLarge;

  /**
   * The full class name including prefix.
   */
  public function className(): string {
    return match ($this) {
      static::Small => 'mx-icon--size-sm',
      static::Medium => 'mx-icon--size-md',
      static::Large => 'mx-icon--size-lg',
      static::ExtraLarge => 'mx-icon--size-xl',
    };
  }

}
