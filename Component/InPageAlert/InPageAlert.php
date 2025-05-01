<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\InPageAlert;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Component as CommonComponent;

/**
 * @see https://mixtape.pnx.io/section-elements.html#kssref-elements-messages
 */
#[Css('in-page-alert.css', preprocess: true)]
#[Slots\Attribute\ModifySlots(add: [
  // Unique to Mixtape:
  'closable',
])]
class InPageAlert extends CommonComponent\InPageAlert\InPageAlert implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        return parent::build($build)
          ->set('heading', $this->heading->heading)
          ->set('content', $this->content->markup)
          ->set('link', '') // @todo
          ->set('type', \strtolower($this->type->name))
          ->set('closable', true)
        ;
    }
}
