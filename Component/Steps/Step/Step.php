<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Steps\Step;

use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;

#[Slots\Attribute\RenameSlot(original: 'isEnabled', new: 'status')]
class Step extends CommonComponent\Steps\Step\Step implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

}
