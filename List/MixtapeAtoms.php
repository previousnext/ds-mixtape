<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Definition;
use Pinto\Attribute\DependencyOn;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;
use PreviousNext\Ds\Mixtape\Atom;

#[CanonicalProduct]
#[DependencyOn(MixtapeGlobal::Global)]
enum MixtapeAtoms implements ObjectListInterface {

  use MixtapeListTrait;

  #[Definition(Atom\Button\Button::class)]
  case Button;

  #[Definition(Atom\Icon\Icon::class)]
  case Icon;

  #[Definition(Atom\Image\Image::class)]
  case Image;

  #[Definition(Atom\Link\Link::class)]
  case Link;

  #[Definition(Atom\LinkedImage\LinkedImage::class)]
  case LinkedImage;

}
