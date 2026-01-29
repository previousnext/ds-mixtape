<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Pagination;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('pagination.css', preprocess: FALSE)]
#[Scenarios([CommonComponents\Pagination\PaginationScenarios::class])]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
class Pagination extends CommonComponents\Pagination\Pagination implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

}
