<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\InPageNavigation;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

/**
 * Searches areas with '.js-content' selector (see Twig).
 */
#[Asset\Css('in-page-navigation.css', preprocess: TRUE)]
#[Asset\Js('in-page-navigation.entry.js', preprocess: TRUE, attributes: ['type' => 'module'])]
#[Scenarios([CommonComponents\InPageNavigation\InPageNavigationScenarios::class])]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\RenameSlot(original: 'includeElements', new: 'levels')]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
class InPageNavigation extends CommonComponents\InPageNavigation\InPageNavigation implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('includeElements', \iterator_to_array($this->modifiers->getInstancesOf(CommonComponents\InPageNavigation\InPageNavigationIncludeElementsInterface::class)->map(
        static fn (CommonComponents\InPageNavigation\InPageNavigationIncludeElementsInterface $includeElements): string => $includeElements->selector(),
      )));
  }

}
