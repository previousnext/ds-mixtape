<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Header\HeaderStacked;

use Pinto\Attribute\Asset\Css;
use Pinto\Attribute\ObjectType;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Layout\Header\HeaderSlots;
use PreviousNext\Ds\Common\Utility as CommonUtilities;
use PreviousNext\Ds\Mixtape\Component\Navigation\NavigationType;
use PreviousNext\Ds\Mixtape\Layout;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

/**
 * Unique to Mixtape.
 */
#[
  Css('header.css', preprocess: TRUE),
  ObjectType\Slots(slots: [HeaderSlots::class]),
  Scenarios([HeaderStackedScenarios::class]),
]
class HeaderStacked implements Utility\MixtapeObjectInterface {

  use CommonUtilities\ObjectTrait;
  use Utility\ObjectTrait;
  use Layout\Header\HeaderTrait;

  protected function build(Slots\Build $build): Slots\Build {
    /** @var \PreviousNext\Ds\Mixtape\Component\Navigation\Navigation $navigation */
    $navigation = CommonComponent\Navigation\Navigation::create('id', 'Navigation');
    $navigation->navigationType = NavigationType::Dropdown;
    foreach ($this->menu as $menu) {
      $navigation[] = $menu;
    }

    return $build
      ->set(HeaderSlots::logo, $this->logo)
      ->set(HeaderSlots::title, $this->title)
      ->set(HeaderSlots::description, $this->description)
      ->set(HeaderSlots::search, $this->hasSearch ? CommonComponent\SearchForm\SearchForm::create('/search-for-common') : NULL)
      ->set(HeaderSlots::navigation, $navigation)
      ->set(HeaderSlots::controls, $this->controls->map(static fn (CommonAtoms\Button\Button $button): mixed => $button())->toArray());
  }

}
