<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\LinkedImage;

use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Slots\Attribute\RenameSlot(original: 'link', new: 'href')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\ModifySlots(add: [
  'title',
])]
#[Scenarios([CommonAtoms\LinkedImage\LinkedImageScenarios::class])]
class LinkedImage extends CommonAtoms\LinkedImage\LinkedImage implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return $build
      ->set('title', $this->link->title)
      ->set('link', $this->link->href)
      ->set('image', $this->image);
  }

}
