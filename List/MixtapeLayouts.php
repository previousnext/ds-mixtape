<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Definition;
use Pinto\Attribute\DependencyOn;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;
use PreviousNext\Ds\Mixtape\Layout;

#[CanonicalProduct]
#[DependencyOn(MixtapeGlobal::Global)]
enum MixtapeLayouts implements ObjectListInterface {

  use MixtapeListTrait;

  #[Definition(Layout\Grid\Grid::class)]
  case Grid;

  #[Definition(Layout\Grid\GridItem\GridItem::class)]
  case GridItem;

  #[Definition(Layout\Section\Section::class)]
  case Section;
}
