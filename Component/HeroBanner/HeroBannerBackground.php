<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\HeroBanner;

use PreviousNext\Ds\Common\Component\HeroBanner\HeroBannerModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum HeroBannerBackground implements HeroBannerModifierInterface {

  case White;
  case Dark;
  case OffWhite;
  case Light;

  public function modifierName(): ?string {
    return match ($this) {
      static::White => NULL,
      static::Dark => 'dark',
      static::OffWhite => 'off-white',
      static::Light => 'light',
    };
  }

}
