<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Layout as CommonLayout;
use PreviousNext\Ds\Common\Modifier\ModifierClassInterface;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('grid.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([CommonLayout\Grid\GridScenarios::class, GridScenarios::class])]
class Grid extends CommonLayout\Grid\Grid implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    foreach ($this->modifiers as $modifier) {
      if ($modifier instanceof ModifierClassInterface) {
        // Attribute guarantees 'class' offset exists.
        $this->containerAttributes['class'][] = $modifier->className();
      }
    }

    return parent::build($build)
      ->set('as', $this->as->element())
      // Mixtape `modifiers` may only contain values from
      // GridColumnSizeModifier::classPart().
      ->set('modifiers', $this->modifiers->getInstancesOf(GridColumnSizeModifierInterface::class)->map(
        static fn (GridColumnSizeModifierInterface $modifier): string => $modifier->classPart(),
      ));
  }

}
