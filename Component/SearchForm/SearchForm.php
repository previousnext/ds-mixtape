<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SearchForm;

use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\RenameSlot(original: 'actionUrl', new: 'action')]
#[Slots\Attribute\RenameSlot(original: 'searchFieldName', new: 'name')]
#[Scenarios([CommonComponent\SearchForm\SearchFormScenarios::class])]
class SearchForm extends CommonComponent\SearchForm\SearchForm implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

}
