<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

final class MixtapeLists {

  /**
   * @var class-string<\Pinto\List\ObjectListInterface>
   */
  public const Lists = [
    MixtapeAtoms::class,
    MixtapeComponents::class,
    MixtapeGlobal::class,
    MixtapeLayouts::class,
  ];

}
