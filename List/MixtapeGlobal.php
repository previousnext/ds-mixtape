<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Asset\Css;
use Pinto\List\ObjectListInterface;

enum MixtapeGlobal implements ObjectListInterface {

  use MixtapeListTrait;

  #[Css('form.css', preprocess: TRUE)]
  #[Css('base.css', preprocess: TRUE)]
  #[Css('icon.css', preprocess: TRUE)]
  #[Css('button.css', preprocess: TRUE)]
  #[Css('constants.css', preprocess: TRUE)]
  #[Css('utilities.css', preprocess: TRUE)]
  case Global;

  #[Css('drop-menu.css', preprocess: TRUE)]
  case DropMenu;

}
