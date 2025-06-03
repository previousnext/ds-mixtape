<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Steps;

use PreviousNext\Ds\Common\Component\Steps\StepsModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum StepsBackground implements StepsModifierInterface {

  case Dark;
  case Supplementary;
  case Light;

  public function modifierName(): string {
    return match ($this) {
      static::Dark => 'dark',
      static::Supplementary => 'supplementary',
      static::Light => 'light',
    };
  }

}
