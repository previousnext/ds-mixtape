<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Callout;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Component as CommonComponent;

/**
 * @see LINK_TO_MIXTAPE_DOCS @todo
 */
#[Css('callout.css', preprocess: true)]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
class Callout extends CommonComponent\Callout\Callout implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        return parent::build($build);
    }
}
