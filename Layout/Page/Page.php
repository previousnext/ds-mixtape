<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Page;

use Drupal\Core\Render\Markup;
use Drupal\Core\Template\Attribute;
use Drupal\Core\Url;
use Pinto\Attribute\Asset;
use Pinto\Attribute\ObjectType;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Atom\Html\Html;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Common\Utility as CommonUtility;
use PreviousNext\Ds\Common\Vo\MenuTree\MenuTree;
use PreviousNext\Ds\Mixtape\Layout\Header\HeaderStacked\HeaderStacked;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

/**
 * A standard template that sits inside <body>.
 */
#[ObjectType\Slots(slots: [
  'masthead',
  'header',
  'main',
  'footer',
  'attributes',
])]
#[Asset\Css('page.css', preprocess: TRUE)]
#[Scenarios([PageScenarios::class])]
class Page implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;
  use CommonUtility\ObjectTrait;

  /**
   * @phpstan-param array{'#markup': \Drupal\Component\Render\MarkupInterface|string} $title
  */
  final private function __construct(
    public array $title,
    public mixed $content,
    public Attribute $containerAttributes,
  ) {
  }

  /**
   * @phpstan-param array{'#markup': \Drupal\Component\Render\MarkupInterface|string} $title
   */
  public static function create(
    array $title,
    mixed $content,
  ): static {
    return new static(
      title: $title,
      content: $content,
      containerAttributes: new Attribute(),
    );
  }

  protected function build(Slots\Build $build): Slots\Build {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // @fixme workaround scoping bug with `_class_handler.twig`
    $this->containerAttributes['fixme'] = 'fixme';

    $icon = CommonAtoms\Icon\Icon::create('chevron-down');

    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // Level 1:
    $menu = [];
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('News', $url));
    $menu[] = $treeA = MenuTree::create(CommonAtoms\Link\Link::create('About us', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Contact', $url));
    $menu[] = MenuTree::create(CommonAtoms\Link\Link::create('Resources', $url));
    $treeA[] = MenuTree::create(CommonAtoms\Link\Link::create('Link A1', $url));

    return $build
      ->set('main', $this->content)
      ->set('masthead', (CommonLayouts\Masthead\Masthead::create(
        content: Html::create(Markup::create('A PreviousNext Product')),
        links: [CommonAtoms\Link\Link::create('Link 1', $url)],
      ))())
      ->set('header', HeaderStacked::create(
        logo: CommonAtoms\LinkedImage\LinkedImage::create(
          // @todo Mixtape logo makes search look bizarre when logo is taller...
          CommonComponents\Media\Image\Image::createSample(120, 49),
          CommonAtoms\Link\Link::create('LinkedImageText!', $url),
        ),
        // title: \Drupal::configFactory()->get('system.site')->get('name'),
        title: 'Site name',
        description: '<em>Slogan</em>',
        hasSearch: TRUE,
        menu: $menu,
        controls: [
          CommonAtoms\Button\Button::create(
            title: 'Translate',
            as: CommonAtoms\Button\ButtonType::Button,
            iconEnd: $icon,
          ),
        ],
      ))
      // @todo Footer.
      ->set('footer', NULL)
      ->set('attributes', $this->containerAttributes);
  }

}
