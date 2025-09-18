<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

use PreviousNext\Ds\Common\Layout\Section\SectionModifierInterface;

enum SectionWidth implements SectionModifierInterface {

  case Narrow;
  case Feature;
  case Full;

  /**
   * Suffix for `mx-section--`.
   */
  public function modifierName(): string {
    return match ($this) {
      static::Narrow => 'narrow',
      static::Feature => 'feature',
      static::Full => 'full',
    };
  }

}
