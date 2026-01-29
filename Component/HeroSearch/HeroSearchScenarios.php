<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\HeroSearch;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom as CommonAtom;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\IdsTools\Scenario\Scenario;

class HeroSearchScenarios {

  /**
   * @phpstan-return \Generator<HeroSearch>
   */
  #[Scenario(viewPortWidth: 1000, viewPortHeight: 300)]
  final public static function mixtapeHeroBannerBackground(): \Generator {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');
    foreach (HeroSearchBackground::cases() as $background) {
      /** @var HeroSearch $instance */
      $instance = CommonComponents\HeroSearch\HeroSearch::create(
        title: 'Title!',
        links: CommonComponents\LinkList\LinkList::create([
          CommonAtom\Link\Link::create(title: 'Link 1!', url: $url),
          CommonAtom\Link\Link::create(title: 'Link 2!', url: $url),
          CommonAtom\Link\Link::create(title: 'Link 3!', url: $url),
          CommonAtom\Link\Link::create(title: 'Link 4!', url: $url),
          CommonAtom\Link\Link::create(title: 'Link 5!', url: $url),
        ]),
        searchFormOrActionUrl: 'https://example.com/search',
      );
      $instance->modifiers[] = $background;
      yield $background->name => $instance;
    }
  }

}
