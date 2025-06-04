<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Pagination\PaginationItem;

use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Mixtape\Utility;

class PaginationItem extends CommonComponents\Pagination\PaginationItem\PaginationItem implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    if ($this->link !== NULL) {
      $this->link->current = $this->isEnabled;
    }

    return parent::build($build);
  }

}
