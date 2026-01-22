<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Definition;
use Pinto\Attribute\DependencyOn;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;
use PreviousNext\Ds\Common\Utility\TemplateDirectory;
use PreviousNext\Ds\Common\Utility\TemplateFile;
use PreviousNext\Ds\Mixtape\Component;

#[CanonicalProduct]
#[DependencyOn(MixtapeGlobal::Global)]
enum MixtapeComponents implements ObjectListInterface {

  use MixtapeListTrait {
    MixtapeListTrait::dsDirectory as public originalDsDirectory;
  }

  #[Definition(Component\Accordion\Accordion::class)]
  case Accordion;

  #[Definition(Component\Accordion\AccordionItem\AccordionItem::class)]
  case AccordionItem;

  #[Definition(Component\Breadcrumb\Breadcrumb::class)]
  case Breadcrumb;

  #[Definition(Component\Callout\Callout::class)]
  case Callout;

  #[Definition(Component\Card\Card::class)]
  #[DependencyOn(MixtapeGlobal::Global)]
  case Card;

  #[Definition(Component\HeroBanner\HeroBanner::class)]
  case HeroBanner;

  #[Definition(Component\InPageAlert\InPageAlert::class)]
  case InPageAlert;

  #[Definition(Component\InPageNavigation\InPageNavigation::class)]
  #[DependencyOn(self::Navigation)]
  case InPageNavigation;

  #[Definition(Component\LinkList\LinkList::class)]
  case LinkList;

  #[Definition(Component\ListItem\ListItem::class)]
  #[TemplateDirectory('Component/ListItem')]
  #[DependencyOn(MixtapeLayouts::Section)]
  case ListItem;

  #[Definition(Component\Navigation\Navigation::class)]
  case Navigation;

  #[Definition(Component\Pagination\Pagination::class)]
  case Pagination;

  #[Definition(Component\Pagination\PaginationItem\PaginationItem::class)]
  case PaginationItem;

  #[Definition(Component\SearchForm\SearchForm::class)]
  #[TemplateDirectory('Form/Search')]
  case SearchForm;

  #[Definition(Component\SideNavigation\SideNavigation::class)]
  case SideNavigation;

  #[Definition(Component\SocialLinks\SocialLinks::class)]
  case SocialLinks;

  #[Definition(Component\SocialShare\SocialShare::class)]
  case SocialShare;

  #[Definition(Component\Steps\Steps::class)]
  case Steps;

  #[TemplateFile('step-item')]
  #[TemplateDirectory('Component/Steps')]
  #[Definition(Component\Steps\Step\Step::class)]
  case Step;

  #[Definition(Component\Tabs\Tabs::class)]
  #[DependencyOn(MixtapeGlobal::DropMenu)]
  case Tabs;

  #[Definition(Component\Tabs\TabsItem\TabsItem::class)]
  case TabItem;

  #[Definition(Component\Tags\Tags::class)]
  case Tags;

  #[Definition(Component\UtilityList\UtilityList::class)]
  #[DependencyOn(self::Navigation)]
  case UtilityList;

  private function dsDirectory(): string {
    if ($this === MixtapeComponents::Tags) {
      return 'Component/Tag';
    }

    return $this->originalDsDirectory();
  }

}
