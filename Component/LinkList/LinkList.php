<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\LinkList;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Atom\Link\Link;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('link-list.css', preprocess: FALSE)]
#[Scenarios([CommonComponent\LinkList\LinkListScenarios::class])]
class LinkList extends CommonComponent\LinkList\LinkList implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('items', CommonAtoms\Html\Html::createFromCollection($this->map(static function (CommonAtoms\Link\Link $item): mixed {
        \assert($item instanceof Link);
        $item->asListItem = TRUE;
        return $item();
      })->toArray()))
      ->set('title', $this->title);
  }

}
