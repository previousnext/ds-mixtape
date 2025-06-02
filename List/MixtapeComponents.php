<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Definition;
use Pinto\Attribute\DependencyOn;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;
use PreviousNext\Ds\Mixtape\Component;

#[CanonicalProduct]
#[DependencyOn(MixtapeGlobal::Global)]
enum MixtapeComponents implements ObjectListInterface {

  use MixtapeListTrait;

  #[Definition(Component\Accordion\Accordion::class)]
  case Accordion;

  #[Definition(Component\AccordionItem\AccordionItem::class)]
  case AccordionItem;

  #[Definition(Component\Callout\Callout::class)]
  case Callout;

  #[Definition(Component\Card\Card::class)]
  #[DependencyOn(MixtapeGlobal::Global)]
  case Card;

  #[Definition(Component\HeroBanner\HeroBanner::class)]
  case HeroBanner;

  #[Definition(Component\InPageAlert\InPageAlert::class)]
  case InPageAlert;

  #[Definition(Component\LinkList\LinkList::class)]
  case LinkList;
}
