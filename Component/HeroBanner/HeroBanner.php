<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\HeroBanner;

use Drupal\Core\Template\Attribute;
use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Modifier;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('hero-banner.css', preprocess: FALSE)]
#[Slots\Attribute\RenameSlot(original: 'links', new: 'linkList')]
#[Scenarios([
  CommonComponent\HeroBanner\HeroBannerScenarios::class,
  HeroBannerScenarios::class,
])]
class HeroBanner extends CommonComponent\HeroBanner\HeroBanner implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('containerAttributes', new Attribute())
      // Mixtape `modifiers` may only contain values from
      // HeroBannerBackground::modifierName().
      ->set('modifiers', $this->modifiers->getInstancesOf(HeroBannerBackground::class)->map(
        static fn (HeroBannerBackground $modifier): ?string => $modifier->modifierName(),
      ))
      ->set('title', $this->title)
      ->set('content', Atom\Html\Html::createFromCollection($this))
      ->set('subtitle', $this->subtitle)
      ->set('link', $this->link)
      ->set('image', $this->image)
      ->set('highlight', $this->highlight)
      // Only image or links are allowed in mixtape. Need to nullify the object if links object is empty.
      ->set('links', $this->links !== NULL && $this->links->count() !== 0 ? $this->links : NULL);
  }

  public static function createCta(
    string $title,
    ?string $subtitle = NULL,
    // Maybe these should be their own variant of this object...
    Atom\Button\Button|Atom\Link\Link|null $link = NULL,
    ?CommonComponent\Media\Image\Image $image = NULL,
    ?CommonComponent\LinkList\LinkList $links = NULL,
    ?Atom\Button\Button $button = NULL,
  ): static {
    // Auto-builders might provide an object with no links, this is fine.
    // @todo move to external validation.
    if ($image !== NULL && $links !== NULL && $links->count() > 0) {
      throw new \LogicException(\sprintf('A `%s` object cannot have both $image and $links populated.', static::class));
    }

    $link = $link ?? $button;

    // These are the only two lines that matter ...
    $heading = Atom\Heading\Heading::create($title, Atom\Heading\HeadingLevel::Two);
    $heading->containerAttributes->addClass('mx-heading--xxl');

    return CommonComponent\HeroBanner\HeroBanner::factoryCreate(
      title: $heading,
      subtitle: $subtitle,
      link: $link,
      image: $image,
      links: $links,
      highlight: FALSE,
      modifiers: new Modifier\ModifierBag(CommonComponent\HeroBanner\HeroBannerModifierInterface::class),
      containerAttributes: new Attribute(),
    );
  }

}
