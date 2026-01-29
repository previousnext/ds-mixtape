<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Asset\Css;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;

#[CanonicalProduct]
enum MixtapeGlobal implements ObjectListInterface {

  use MixtapeListTrait;

  #[Css('constants.css', preprocess: TRUE)]
  #[Css('base.css', preprocess: TRUE)]
  #[Css('icon.css', preprocess: TRUE)]
  #[Css('button.css', preprocess: TRUE)]
  #[Css('form.css', preprocess: TRUE)]
  #[Css('utilities.css', preprocess: TRUE)]
  case Global;

  #[Css('drop-menu.css', preprocess: FALSE)]
  case DropMenu;

}
