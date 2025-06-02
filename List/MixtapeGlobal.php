<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Asset\Css;
use Pinto\List\ObjectListInterface;

enum MixtapeGlobal implements ObjectListInterface {

  use MixtapeListTrait;

  #[Css('constants.css', preprocess: TRUE)]
  #[Css('base.css', preprocess: TRUE)]
  case Global;

}
