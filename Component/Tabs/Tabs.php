<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Tabs;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Component\Tabs\Tab;
use PreviousNext\Ds\Common\Component\Tabs\TabItem\TabItem;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('tabs.css', preprocess: TRUE)]
#[Asset\Js('tabs.entry.js', preprocess: TRUE, attributes: ['type' => 'module'])]
#[Scenarios([CommonComponent\Tabs\TabsScenarios::class])]
class Tabs extends CommonComponent\Tabs\Tabs implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    // If nothing was delegated as active by now, set first to active.
    if ($this->active === NULL && $this->count() !== 0) {
      $this->active = $this->first();
    }

    /** @var array<TabItem> $tabs */
    $tabs = $this->map(function (Tab $item): mixed {
      /** @var \PreviousNext\Ds\Mixtape\Component\Tabs\TabsItem\TabsItem $tabItem */
      $tabItem = TabItem::create((string) $item->id, $item->title, $item);
      // Mixtape sets active on the TabItem, not TabListItem.
      $tabItem->active = $this->active === $item;
      return $tabItem();
    })->toArray();

    return $build
      ->set('id', $this->id)
      ->set('title', $this->title)
      // Mixtape does not use this.
      ->set('listItems', [])
      ->set('items', $tabs);
  }

}
