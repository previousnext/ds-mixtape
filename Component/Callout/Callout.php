<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Callout;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

/**
 * @see LINK_TO_MIXTAPE_DOCS @todo
 */
#[Css('callout.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([CommonComponent\Callout\CalloutScenarios::class])]
class Callout extends CommonComponent\Callout\Callout implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

}
