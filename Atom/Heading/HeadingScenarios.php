<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Heading;

use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Atom\Heading\HeadingLevel;

final class HeadingScenarios {

  /**
   * @phpstan-return \Generator<\PreviousNext\Ds\Mixtape\Atom\Heading\Heading>
   */
  final public static function headingVisuallyAs(): \Generator {
    foreach (HeadingLevel::cases() as $headingLevel) {
      /** @var \PreviousNext\Ds\Mixtape\Atom\Heading\Heading $instance */
      $instance = CommonAtoms\Heading\Heading::create(
        heading: 'Heading text',
        level: $headingLevel,
      );
      foreach (HeadingLevel::cases() as $visuallyAsHeadingLevel) {
        if ($visuallyAsHeadingLevel === $headingLevel) {
          // Skip when the same. E.g h2 as h2.
          continue;
        }

        $i = clone $instance;
        $i->visuallyAs($visuallyAsHeadingLevel);
        yield \sprintf('heading-%s--as--%s', $headingLevel->element(), $visuallyAsHeadingLevel->element()) => $i;
      }
    }
  }

}
