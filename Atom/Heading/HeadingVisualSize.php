<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Heading;

use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Modifier\Mutex;

/**
 * There is no support for H6.
 */
#[Mutex]
enum HeadingVisualSize implements Atom\Heading\HeadingModifierInterface {

  case One;
  case Two;
  case Three;
  case Four;
  case Five;

  /**
   * A `modifier` in heading.twig.
   */
  public function asModifier(): string {
    return match ($this) {
      static::One => 'h1',
      static::Two => 'h2',
      static::Three => 'h3',
      static::Four => 'h4',
      static::Five => 'h5',
    };
  }

  public static function fromHeadingLevel(Atom\Heading\HeadingLevel $headingLevel): static {
    return match ($headingLevel) {
      Atom\Heading\HeadingLevel::One => static::One,
      Atom\Heading\HeadingLevel::Two => static::Two,
      Atom\Heading\HeadingLevel::Three => static::Three,
      Atom\Heading\HeadingLevel::Four => static::Four,
      Atom\Heading\HeadingLevel::Five => static::Five,
      // Six will pretend to be a five.
      Atom\Heading\HeadingLevel::Six => static::Five,
    };
  }

}
