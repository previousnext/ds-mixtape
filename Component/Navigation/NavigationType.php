<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Navigation;

use PreviousNext\Ds\Common\Modifier\Mutex;

#[Mutex]
enum NavigationType {

  case Collapsible;
  case Dropdown;
  case Mega;
  case Footer;

  public function typeName(): string {
    return match ($this) {
      static::Collapsible => 'collapsible',
      static::Dropdown => 'dropdown',
      static::Mega => 'mega',
      static::Footer => 'footer',
    };
  }

}
