<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Icon;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtom;
use PreviousNext\Ds\Mixtape\Utility;

#[Css('icon.css', preprocess: TRUE)]
class Icon extends CommonAtom\Icon\Icon implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return $build
      ->set('icon', NULL)
      ->set('text', $this->text)
      ->set('alignmentType', NULL)
      ->set('modifier', NULL)
      ->set('attributes', $this->attributes);
  }

}
