<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Definition;
use Pinto\Attribute\DependencyOn;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;
use PreviousNext\Ds\Common\Utility\TemplateDirectory;
use PreviousNext\Ds\Common\Utility\TemplateFile;
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

  // @todo per Rikki, LinkedImage to use logo.twig for now.
  #[Definition(Atom\LinkedImage\LinkedImage::class)]
  #[TemplateFile('logo')]
  #[TemplateDirectory('Layout/Header/twig')]
  case LinkedImage;

  #[Definition(Atom\Bare\Bare::class)]
  case Bare;

}
