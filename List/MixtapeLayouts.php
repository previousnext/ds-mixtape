<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Asset\Css;
use Pinto\Attribute\Definition;
use Pinto\Attribute\DependencyOn;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;
use PreviousNext\Ds\Mixtape\Layout;

#[CanonicalProduct]
#[DependencyOn(MixtapeGlobal::Global)]
enum MixtapeLayouts implements ObjectListInterface {

  use MixtapeListTrait;

  #[Definition(Layout\Footer\Footer::class)]
  #[DependencyOn(MixtapeLayouts::Page)]
  #[DependencyOn(MixtapeComponents::Navigation)]
  case Footer;

  #[Definition(Layout\Grid\Grid::class)]
  case Grid;

  #[Definition(Layout\Grid\GridItem\GridItem::class)]
  case GridItem;

  #[Definition(Layout\Header\Header::class)]
  #[DependencyOn(self::Section)]
  case Header;

  #[Definition(Layout\Section\Section::class)]
  case Section;

  #[Definition(Layout\Sidebar\Sidebar::class)]
  case Sidebar;

  #[Definition(Layout\Masthead\Masthead::class)]
  #[DependencyOn(MixtapeLayouts::Page)]
  case Masthead;

  #[Definition(Layout\Page\Page::class)]
  #[Css('page.css')]
  case Page;

}
