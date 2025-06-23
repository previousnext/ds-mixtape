<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Header;

use PreviousNext\Ds\Common\Layout\Header\HeaderModifierInterface;
use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum HeaderLayout implements HeaderModifierInterface {

  case Standard;
  case Stacked;

}
