<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Masthead;

use PreviousNext\Ds\Common\Layout\Masthead\MastheadModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum MastheadBackground implements MastheadModifierInterface {

  case Light;
  case Dark;

  public function background(): string {
    return match ($this) {
      static::Light => 'light',
      static::Dark => 'dark',
    };
  }

}
