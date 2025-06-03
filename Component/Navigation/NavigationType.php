<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Navigation;

enum NavigationType {
  // @todo Does an interface need to be extracted for all Navigation DS's?
  // @todo #[Mutex]
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
