<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\HeroBanner;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom as CommonAtom;
use PreviousNext\Ds\Common\Component as CommonComponent;

final class HeroBannerScenarios {

  final public static function mixtapeHeroBanner(): HeroBanner {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    /** @var HeroBanner $instance */
    $instance = CommonComponent\HeroBanner\HeroBanner::create(
      'Title!',
      'Subtitle!',
      image: CommonComponent\Media\Image\Image::createSample(600, 200),
    );
    $instance->modifiers[] = HeroBannerBackground::OffWhite;
    return $instance;
  }

  final public static function mixtapeHeroBannerLinkList(): HeroBanner {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    /** @var HeroBanner $instance */
    $instance = CommonComponent\HeroBanner\HeroBanner::create(
      'Hero Link List Title!',
      'Hero Link List Subtitle!',
      link: CommonAtom\Link\Link::create('Hero Banner Link!', $url),
    );
    // One at a time: #[Mutex]
    // $instance->modifiers[] = HeroBannerBackground::OffWhite;.
    $instance->modifiers[] = HeroBannerBackground::Dark;
    return $instance;
  }

}
