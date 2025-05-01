<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\HeroBanner;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Component as CommonComponent;

/**
 * @see https://mixtape.pnx.io/section-grouped-components.html#kssref-grouped-components-page-title-hero
 */
#[Css('hero-banner.css', preprocess: true)]
#[Slots\Attribute\RenameSlot(original: 'links', new: 'linkList')]
class HeroBanner extends CommonComponent\HeroBanner\HeroBanner implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        return parent::build($build)
          // Mixtape `modifiers` may only contain values from HeroBannerBackground::modifierName().
          ->set('modifiers', $this->modifiers->getInstancesOf(HeroBannerBackground::class)->map(
              static fn (HeroBannerBackground $modifier): string => $modifier->modifierName()
          ))
          ->set('title', $this->title)
          ->set('subtitle', $this->subtitle)
          ->set('link', $this->link instanceof Atom\Link\LinkWithLabel ? $this->link->markup() : $this->link?->url)
          ->set('image', $this->image)
          ->set('links', $this->links)
        ;
    }
}
