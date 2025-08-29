<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Accordion;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('accordion.css', preprocess: TRUE)]
#[Asset\Js('accordion.entry.js', preprocess: TRUE, attributes: ['type' => 'module'])]
#[Scenarios([CommonComponent\Accordion\AccordionScenarios::class])]
class Accordion extends CommonComponent\Accordion\Accordion implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('title', $this->title);
  }

}
