<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Bare;

use Pinto\Slots;

trait BareTrait {

  public mixed $inner;

  final protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('inner', $this->buildBare($build));
  }

  /**
   * Build-a-bare 🧸.
   *
   * A bare template only contains a single value, return the inner content of the bare , return the inner content of the bare template.
   */
  abstract public function buildBare(Slots\Build $build): mixed;

}
