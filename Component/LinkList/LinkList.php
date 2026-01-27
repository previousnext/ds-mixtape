<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\LinkList;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('link-list.css', preprocess: TRUE)]
#[Scenarios([CommonComponent\LinkList\LinkListScenarios::class])]
class LinkList extends CommonComponent\LinkList\LinkList implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('items', \array_map(static function (Atom\Link\Link $link) {
        return $link();
      }, $this->toArray()))
      ->set('title', $this->title);
  }

}
