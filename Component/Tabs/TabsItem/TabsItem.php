<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Tabs\TabsItem;

use Drupal\Core\Template\Attribute;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom\Html\Html;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;

#[Slots\Attribute\ModifySlots(add: [
  new Slots\Slot('active'),
  // @todo move to common
  new Slots\Slot('attributes'),
])]
class TabsItem extends CommonComponent\Tabs\TabItem\TabItem implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  public bool $active;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('active', $this->active)
      ->set('attributes', new Attribute())
      ->set('content', Html::createFromCollection($this));
  }

}
