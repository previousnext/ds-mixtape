<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Card;

use PreviousNext\Ds\Common\Component\Card\CardModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum CardLayout implements CardModifierInterface {

  case Block;
  case Reversed;
  case Collapsed;

  /**
   * Suffix for `mx-card--`.
   */
  public function modifierName(): string {
    return match ($this) {
      static::Block => 'block',
      static::Reversed => 'reversed',
      static::Collapsed => 'collapse',
    };
  }

}
