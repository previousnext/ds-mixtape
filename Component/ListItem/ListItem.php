<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\ListItem;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Component\ListItem\InfoPosition;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('card.css', preprocess: FALSE)]
#[Asset\Css('list-item.css', preprocess: FALSE)]
#[Scenarios([CommonComponent\ListItem\ListItemScenarios::class])]
#[Slots\Attribute\ModifySlots(add: [
  new Slots\Slot('modifiers'),
  new Slots\Slot('infoBefore'),
])]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
class ListItem extends CommonComponent\ListItem\ListItem implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    $modifiers = [];

    if ($this->modifiers->contains(CommonComponent\ListItem\ImagePosition::Reverse)) {
      $modifiers[] = 'reversed';
    }

    if ($this->modifiers->contains(CommonComponent\ListItem\DisplayLinkAs::Block)) {
      $modifiers[] = 'block';
    }

    return parent::build($build)
      ->set('modifiers', $modifiers)
      ->set('infoBefore', $this->infoPosition === InfoPosition::Before)
      ->set('info', $this->infoPosition === InfoPosition::None ? NULL : $this->info)
      ->set('tags', $this->tags->count() > 0 ? $this->tags : NULL);
  }

}
