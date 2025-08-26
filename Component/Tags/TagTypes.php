<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Tags;

enum TagTypes {

  case Text;
  case Link;
  case Checkbox;

  public function typeName(): string {
    return match ($this) {
      static::Text => 'text',
      static::Link => 'link',
      static::Checkbox => 'checkbox',
    };
  }

}
