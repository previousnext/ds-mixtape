<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Card;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Asset\Css('card.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([
  CommonComponent\Card\CardScenarios::class,
  CardScenarios::class,
])]
class Card extends CommonComponent\Card\Card implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    $this->containerAttributes->addClass(...$this->modifiers->getInstancesOf(CardLayout::class)->map(
      static fn (CardLayout $modifier): string => \sprintf('mx-card--%s', $modifier->modifierName()),
    ));

    return parent::build($build)
      ->set('image', $this->image)
      ->set('links', $this->links)
      ->set('modifiers', [])
      ->set('heading', $this->heading)
      ->set('content', $this->content?->markup)
      ->set('link', $this->link)
      ->set('tags', $this->tags->count() > 0 ? $this->tags : NULL)
      ->set('date', $this->date?->format('j F Y'))
      ->set('icon', $this->icon);
  }

}
