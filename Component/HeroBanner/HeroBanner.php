<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\HeroBanner;

use Drupal\Core\Template\Attribute;
use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('hero-banner.css', preprocess: TRUE)]
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
      ->set('subtitle', $this->subtitle)
      ->set('link', $this->link)
      ->set('image', $this->image)
      ->set('highlight', $this->highlight)
      ->set('links', $this->links);
  }

}
