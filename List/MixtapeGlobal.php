<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Drupal\pinto\List\StreamWrapperAssetInterface;
use Pinto\Attribute\Asset\Css;
use Pinto\Attribute\DependencyOn;
use Pinto\List\ObjectListInterface;

enum MixtapeGlobal implements ObjectListInterface, StreamWrapperAssetInterface
{
    use MixtapeListTrait;

    #[Css('constants.css', preprocess: true)]
    #[DependencyOn(MixtapeAtoms::GlobalAtom)]
    case Global;
}
