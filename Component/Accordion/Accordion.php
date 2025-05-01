<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Accordion;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Component as CommonComponent;

/**
 * @see https://mixtape.pnx.io/section-elements.html#kssref-elements-accordion
 */
#[Asset\Css('accordion.css', preprocess: true)]
#[Asset\Js('accordion.entry.js', preprocess: true)]
class Accordion extends CommonComponent\Accordion\Accordion implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        return parent::build($build)
          ->set('title', $this->title)
        ;
    }
}
