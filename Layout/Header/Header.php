<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Header;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Common\Layout\Header\HeaderScenarios;
use PreviousNext\Ds\Mixtape\Atom\Bare\BareTrait;
use PreviousNext\Ds\Mixtape\Component\Navigation\NavigationType;
use PreviousNext\Ds\Mixtape\Layout\Header\HeaderStandard\HeaderStandard;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('header.css', preprocess: TRUE)]
#[Scenarios([HeaderScenarios::class])]
#[Slots\Attribute\ModifySlots(add: [
  new Slots\Slot('inner'),
])]
class Header extends CommonLayouts\Header\Header implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;
  use BareTrait;

  public NavigationType $navigationType;

  protected function buildBare(Slots\Build $build): mixed {
    $header = HeaderStandard::create(
      logo: $this->logo,
      title: $this->title,
      description: $this->description,
      hasSearch: $this->hasSearch,
      menu: $this->menu,
      controls: $this->controls,
    );
    $header->navigationType = $this->navigationType;
    return $header;
  }

}
