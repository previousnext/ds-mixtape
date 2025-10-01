<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Header;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Common\Layout\Header\HeaderSlots;
use PreviousNext\Ds\Mixtape\Component\Navigation\NavigationType;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('header.css', preprocess: TRUE)]
#[Slots\Attribute\ModifySlots(add: [
  new Slots\Slot('stacked'),
  new Slots\Slot('attributes'),
])]
#[Scenarios([
  HeaderStackedScenarios::class,
  HeaderStandardScenarios::class,
])]
class Header extends CommonLayouts\Header\Header implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  public NavigationType $navigationType;

  protected function build(Slots\Build $build): Slots\Build {
    $headerLayout = $this->modifiers->getFirstInstanceOf(HeaderLayout::class) ?? HeaderLayout::Standard;
    if ($headerLayout === HeaderLayout::Stacked) {
      $this->navigationType = NavigationType::Dropdown;
    }

    /** @var \PreviousNext\Ds\Mixtape\Component\Navigation\Navigation $navigation */
    $navigation = CommonComponent\Navigation\Navigation::create('id', 'Navigation');
    $navigation->navigationType = $this->navigationType;
    foreach ($this->menu as $menu) {
      $navigation[] = $menu;
    }

    return $build
      ->set(HeaderSlots::logo, $this->logo)
      ->set(HeaderSlots::title, $this->title)
      ->set(HeaderSlots::description, $this->description)
      ->set(HeaderSlots::search, $this->hasSearch ? CommonComponent\SearchForm\SearchForm::create('/search-for-common') : NULL)
      ->set(HeaderSlots::navigation, $navigation)
      ->set(HeaderSlots::controls, $this->controls->map(static fn (CommonAtoms\Button\Button $button): mixed => $button())->toArray())
      ->set('attributes', $this->containerAttributes)
      ->set('stacked', $headerLayout === HeaderLayout::Stacked);
  }

}
