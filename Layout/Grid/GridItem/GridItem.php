<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid\GridItem;

use Pinto\Slots;
use PreviousNext\Ds\Common\Layout as CommonLayout;
use PreviousNext\Ds\Mixtape\Utility;

#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\RenameSlot(original: 'content', new: 'item')]
class GridItem extends CommonLayout\Grid\GridItem\GridItem implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    $modifiers = [];

    foreach ($this->modifiers->getInstancesOf(GridItemSpanModifier::class) as $span) {
      $modifiers[] = $span->modifierName();
    }

    return parent::build($build)
      ->set('modifiers', $modifiers)
      ->set('as', $this->as->element());
  }

}
