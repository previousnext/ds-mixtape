<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Bare;

use Pinto\Attribute\ObjectType;
use PreviousNext\Ds\Common\Utility\ObjectTrait;
use PreviousNext\Ds\Mixtape\Utility;

#[ObjectType\Slots(method: 'create', bindPromotedProperties: TRUE)]
class Bare implements Utility\MixtapeObjectInterface {

  use ObjectTrait;
  use Utility\ObjectTrait;

  final private function __construct(
    public mixed $inner,
  ) {}

  public static function create(mixed $inner): static {
    return new static($inner);
  }

}
