<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\LinkedImage;

use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Mixtape\Utility;

#[Slots\Attribute\ModifySlots(add: [
  // Unique to Mixtape's logo.twig:
  'alt',
  'src',
  'width',
  'height',
])]
class LinkedImage extends CommonAtoms\LinkedImage\LinkedImage implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return $build
      ->set('href', $this->href->href)
      ->set('image', NULL)
      ->set('alt', $this->image->altText)
      ->set('src', $this->image->source)
      ->set('width', $this->image->width)
      ->set('height', $this->image->height);
  }

}
