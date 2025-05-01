<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Card;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Atom\Link\LinkWithLabel;
use PreviousNext\Ds\Common\Component as CommonComponent;

/**
 * @see https://mixtape.pnx.io/section-elements.html#kssref-elements-content-card
 */
#[Asset\Css('card.css', preprocess: true)]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
class Card extends CommonComponent\Card\Card implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        return parent::build($build)
          ->set('image', $this->image)
          ->set('links', $this->links)
          ->set('modifiers', $this->modifiers)
          ->set('heading', $this->heading?->heading)
          ->set('content', $this->content?->markup)
          ->set('link', $this->link instanceof LinkWithLabel ? $this->link->markup() : $this->link?->url)
          // Mixtape expects a string for tags.
          ->set('tags', \implode(' ', \array_map(static function ($tag) {
              return $tag->title;
          }, $this->tags->toArray())))
          ->set('date', $this->date?->format('j F Y'))
          ->set('icon', '🐴')
        ;
    }
}
