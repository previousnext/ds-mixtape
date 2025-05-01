<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid\GridItem;

use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Layout as CommonLayout;

/**
 * @see https://mixtape.pnx.io/section-layout.html#kssref-layout-grid
 */
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
class GridItem extends CommonLayout\Grid\GridItem\GridItem implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        // @todo handle modifiers...
        $modifiers = [];

        return parent::build($build)
          ->set('modifiers', \array_values($modifiers))
          ->set('as', $this->as->element())
        ;
    }
}
