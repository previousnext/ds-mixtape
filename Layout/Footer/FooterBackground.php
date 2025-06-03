<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Footer;

use PreviousNext\Ds\Common\Layout\Footer\FooterModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum FooterBackground implements FooterModifierInterface {

  case Light;
  case Dark;

  public function background(): string {
    return match ($this) {
      static::Light => 'light',
      static::Dark => 'dark',
    };
  }

}
