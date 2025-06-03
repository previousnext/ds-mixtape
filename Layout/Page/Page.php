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
use PreviousNext\Ds\Common\Layout\Footer\Footer;
use PreviousNext\Ds\Common\Utility as CommonUtility;
use PreviousNext\Ds\Common\Vo\MenuTree\MenuTree;
use PreviousNext\Ds\Common\Vo\MenuTree\MenuTrees;
use PreviousNext\Ds\Mixtape\Atom\Icon\Icons;
use PreviousNext\Ds\Mixtape\Atom\Icon\IconSize;
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
      ->set('footer', $this->footer())
      ->set('attributes', $this->containerAttributes);
  }

  private function footer(): CommonLayouts\Footer\Footer {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    // Level 1:
    $menu = new MenuTrees();
    $menu[] = $treeA = MenuTree::create(CommonAtoms\Link\Link::create('News', $url));
    $menu[] = $treeB = MenuTree::create(CommonAtoms\Link\Link::create('About us', $url));
    $menu[] = $treeC = MenuTree::create(CommonAtoms\Link\Link::create('Contact', $url));

    // Level 2:
    $treeA[] = MenuTree::create(CommonAtoms\Link\Link::create('Events', $url));
    $treeA[] = MenuTree::create(CommonAtoms\Link\Link::create('Media Releases', $url));
    $treeB[] = MenuTree::create(CommonAtoms\Link\Link::create('Resources', $url));
    $treeB[] = MenuTree::create(CommonAtoms\Link\Link::create('Who we are', $url));
    $treeB[] = MenuTree::create(CommonAtoms\Link\Link::create('Join Us', $url));
    $treeC[] = MenuTree::create(CommonAtoms\Link\Link::create('Form', $url));
    $treeC[] = MenuTree::create(CommonAtoms\Link\Link::create('Careers', $url));

    $links = new CommonAtoms\Link\Links();
    $links[] = CommonAtoms\Link\Link::create('Terms & Conditions', $url);
    $links[] = CommonAtoms\Link\Link::create('Accessibility!', $url);

    $fbIcon = CommonAtoms\Icon\Icon::create();
    $fbIcon->modifiers[] = Icons::Facebook;
    $fbIcon->modifiers[] = IconSize::Medium;
    $igIcon = CommonAtoms\Icon\Icon::create();
    $igIcon->modifiers[] = Icons::Instagram;
    $igIcon->modifiers[] = IconSize::Medium;
    $liIcon = CommonAtoms\Icon\Icon::create();
    $liIcon->modifiers[] = Icons::Linkedin;
    $liIcon->modifiers[] = IconSize::Medium;

    $socialLinks = CommonComponents\SocialLinks\SocialLinks::create('Social media links');
    $socialLinks[] = CommonAtoms\Link\Link::create('Facebook', $url, iconStart: $fbIcon);
    $socialLinks[] = CommonAtoms\Link\Link::create('Instagram', $url, iconStart: $igIcon);
    $socialLinks[] = CommonAtoms\Link\Link::create('LinkedIn', $url, iconStart: $liIcon);

    return Footer::create(
      logo: CommonAtoms\LinkedImage\LinkedImage::create(
        CommonComponents\Media\Image\Image::createSample(120, 49),
        CommonAtoms\Link\Link::create('LinkedImageText!', $url),
      ),
      copyright: '© 2025 Company Name',
      menu: $menu,
      socialLinks: $socialLinks,
      links: $links,
    );
  }

}
