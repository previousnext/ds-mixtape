<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Header;

use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Common\Vo\MenuTree\MenuTree;
use PreviousNext\IdsTools\Scenario\Scenario;

final class HeaderStackedScenarios {

  #[Scenario(viewPortHeight: 600, viewPortWidth: 1200)]
  final public static function stacked(): Header {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // Level 1:
    $menu = [];
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('News', $url));
    $menu[] = $treeA = MenuTree::create(CommonAtoms\Link\Link::create('About us', $url));
    $menu[] = $treeB = MenuTree::create(CommonAtoms\Link\Link::create('Contact', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Resources', $url));

    // Level 2:
    $treeA[] = $treeA1 = MenuTree::create(CommonAtoms\Link\Link::create('Link A1', $url));
    $treeA[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A2', $url));
    $treeA[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A3', $url));
    $treeB[] = MenuTree::create(CommonAtoms\Link\Link::create('Link B1', $url));

    // Level 3.
    $treeA1[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A1a', $url));

    $icon = CommonAtoms\Icon\Icon::create('chevron-down');

    /** @var Header $header */
    $header = CommonLayouts\Header\Header::create(
      logo: CommonAtoms\LinkedImage\LinkedImage::create(
        CommonComponents\Media\Image\Image::createSample(120, 49),
        CommonAtoms\Link\Link::create('LinkedImageText!', $url),
      ),
      title: 'Site name!',
      description: 'Site slogan!',
      hasSearch: TRUE,
      menu: $menu,
      controls: [
        CommonAtoms\Button\Button::create(
          title: 'Translate',
          as: CommonAtoms\Button\ButtonType::Button,
          iconEnd: $icon,
        ),
      ],
    );
    $header->modifiers[] = HeaderLayout::Stacked;

    return $header;
  }

}
