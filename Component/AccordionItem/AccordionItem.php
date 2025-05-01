<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\AccordionItem;

use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Component as CommonComponent;

class AccordionItem extends CommonComponent\Accordion\AccordionItem\AccordionItem implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        return parent::build($build);
    }
}
