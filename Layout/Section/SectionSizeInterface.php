<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

use PreviousNext\Ds\Common\Layout\Section\SectionModifierInterface;

interface SectionSizeInterface extends SectionModifierInterface {

  public function modifierName(): string;

}
