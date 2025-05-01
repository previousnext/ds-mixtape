<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Definition;
use Pinto\CanonicalProduct\Attribute\CanonicalProduct;
use Pinto\List\ObjectListInterface;
use PreviousNext\Ds\Mixtape\Atom;

#[CanonicalProduct]
enum MixtapeAtoms implements ObjectListInterface {

    use MixtapeListTrait;

    #[Css('base.css', preprocess: TRUE)]
    case GlobalAtom;

    #[Definition(Atom\Button\Button::class)]
    case Button;

    #[Definition(Atom\Image\Image::class)]
    case Image;
}
