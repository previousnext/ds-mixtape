<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Breadcrumb;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('navigation.css', preprocess: FALSE)]
#[Css('breadcrumb.css', preprocess: FALSE)]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\RenameSlot(original: 'links', new: 'items')]
#[Scenarios([CommonComponent\Breadcrumb\BreadcrumbScenarios::class])]
class Breadcrumb extends CommonComponent\Breadcrumb\Breadcrumb implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

}
