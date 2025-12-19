<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Drupal\pinto\Resource\DrupalLibraryInterface;
use Pinto\Attribute\Asset\Css;
use Pinto\List\ObjectListInterface;

enum MixtapeGlobal implements ObjectListInterface, DrupalLibraryInterface {

  use MixtapeListTrait;

  #[Css('constants.css', preprocess: TRUE)]
  #[Css('base.css', preprocess: TRUE)]
  #[Css('icon.css', preprocess: TRUE)]
  #[Css('button.css', preprocess: TRUE)]
  #[Css('form.css', preprocess: TRUE)]
  #[Css('utilities.css', preprocess: TRUE)]
  case Global;

  #[Css('drop-menu.css', preprocess: TRUE)]
  case DropMenu;

}
