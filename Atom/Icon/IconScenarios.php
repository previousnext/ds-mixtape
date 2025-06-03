<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Icon;

use PreviousNext\Ds\Common\Atom as CommonAtoms;

final class IconScenarios {

  /**
   * @phpstan-return \Generator<\PreviousNext\Ds\Mixtape\Atom\Icon\Icon>
   */
  final public static function sizes(): \Generator {
    foreach (IconSize::cases() as $size) {
      /** @var \PreviousNext\Ds\Mixtape\Atom\Icon\Icon $instance */
      $instance = CommonAtoms\Icon\Icon::create();
      $instance->modifiers[] = Icons::Drupal;
      $instance->modifiers[] = $size;
      yield \sprintf('size-%s', $size->name) => $instance;
    }
  }

}
