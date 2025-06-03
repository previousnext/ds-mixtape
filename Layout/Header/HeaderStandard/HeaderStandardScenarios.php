<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Header\HeaderStandard;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Common\Vo\MenuTree\MenuTree;
use PreviousNext\Ds\Mixtape\Component\Navigation\NavigationType;
use PreviousNext\IdsTools\Scenario\Scenario;

final class HeaderStandardScenarios {

  #[Scenario(viewPortHeight: 600, viewPortWidth: 1200)]
  final public static function standard(): HeaderStandard {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // Level 1:
    $menu = [];
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link B', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link C', $url));

    $header = HeaderStandard::create(
      logo: CommonAtoms\LinkedImage\LinkedImage::create(
        CommonComponents\Media\Image\Image::createSample(120, 49),
        CommonAtoms\Link\Link::create('LinkedImageText!', $url),
      ),
      menu: $menu,
    );
    $header->navigationType = NavigationType::Dropdown;

    return $header;
  }

  #[Scenario(viewPortHeight: 600, viewPortWidth: 1200)]
  final public static function withTitle(): HeaderStandard {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // Level 1:
    $menu = [];
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link B', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link C', $url));

    $header = HeaderStandard::create(
      logo: CommonAtoms\LinkedImage\LinkedImage::create(
        CommonComponents\Media\Image\Image::createSample(120, 49),
        CommonAtoms\Link\Link::create('LinkedImageText!', $url),
      ),
      title: 'Site name!',
      description: 'Site slogan!',
      menu: $menu,
    );
    $header->navigationType = NavigationType::Dropdown;

    return $header;
  }

  #[Scenario(viewPortHeight: 600, viewPortWidth: 1200)]
  final public static function search(): HeaderStandard {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // Level 1:
    $menu = [];
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link B', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link C', $url));

    $header = HeaderStandard::create(
      logo: CommonAtoms\LinkedImage\LinkedImage::create(
        CommonComponents\Media\Image\Image::createSample(120, 49),
        CommonAtoms\Link\Link::create('LinkedImageText!', $url),
      ),
      hasSearch: TRUE,
      menu: $menu,
    );
    $header->navigationType = NavigationType::Dropdown;

    return $header;
  }

  #[Scenario(viewPortHeight: 600, viewPortWidth: 1200)]
  final public static function controls(): HeaderStandard {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // Level 1:
    $menu = [];
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link B', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Link C', $url));

    $icon = CommonAtoms\Icon\Icon::create('chevron-down');

    $header = HeaderStandard::create(
      logo: CommonAtoms\LinkedImage\LinkedImage::create(
        CommonComponents\Media\Image\Image::createSample(120, 49),
        CommonAtoms\Link\Link::create('LinkedImageText!', $url),
      ),
      menu: $menu,
      controls: [
        CommonAtoms\Button\Button::create(
          title: 'Translate',
          as: CommonAtoms\Button\ButtonType::Button,
          iconEnd: $icon,
        ),
      ],
    );
    $header->navigationType = NavigationType::Dropdown;

    return $header;
  }

}
