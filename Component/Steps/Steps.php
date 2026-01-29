<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Steps;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('steps.css', preprocess: FALSE)]
#[Scenarios([
  CommonComponent\Steps\StepsScenarios::class,
  StepsScenarios::class,
])]
#[Slots\Attribute\RenameSlot(original: 'hasBackgroundFill', new: 'fill')]
#[Slots\Attribute\RenameSlot(original: 'hasTextCounters', new: 'counters')]
class Steps extends CommonComponent\Steps\Steps implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('modifiers', $this->modifiers->getInstancesOf(StepsBackground::class)->map(
        static fn (StepsBackground $modifier): string => $modifier->modifierName(),
      )->toArray());
  }

}
