<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\HeroSearch;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtom;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Atom\Heading\HeadingVisualSize;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

/**
 * Hero search component implementation.
 *
 * Note: We are using hero-banner.css in a mixtape hero-search component.
 *
 * @see https://github.com/previousnext/mxds/blob/main/src/Component/HeroSearch/HeroSearch.stories.ts#L3
 */
#[Asset\Css('hero-banner.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\RenameSlot(original: 'links', new: 'linkList')]
#[Scenarios([
  CommonComponent\HeroSearch\HeroSearchScenarios::class,
  HeroSearchScenarios::class,
])]
class HeroSearch extends CommonComponent\HeroSearch\HeroSearch implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    if (NULL !== $this->links?->title && FALSE === $this->links->title->modifiers->hasInstanceOf(HeadingVisualSize::class)) {
      // If there is a link list and there is no HeadingVisualSize already, add one:
      $this->links->title->modifiers[] = HeadingVisualSize::fromHeadingLevel(CommonAtom\Heading\HeadingLevel::Four);
    }

    $modifiers = [];
    if (NULL !== ($background = $this->modifiers->getFirstInstanceOf(HeroSearchBackground::class))) {
      // Mixtape `modifiers` may only contain values from
      // HeroBannerBackground::modifierName().
      $modifiers[] = $background->modifierName();
    }

    return parent::build($build)
      ->set('title', $this->title)
      ->set('content', CommonAtom\Html\Html::createFromCollection($this))
      ->set('subtitle', $this->subtitle)
      ->set('image', $this->image)
      ->set('search', $this->searchForm)
      ->set('links', $this->links)
      ->set('modifiers', $modifiers)
      ->set('containerAttributes', $this->containerAttributes);
  }

}
