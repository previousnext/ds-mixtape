<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Image;

use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Common\Component\Media\Image\ImageSource;
use PreviousNext\Ds\Mixtape\Utility;

/**
 * @see https://mixtape.pnx.io/section-base.html#kssref-base-images
 */
#[Slots\Attribute\RenameSlot(original: 'source', new: 'src')]
#[Slots\Attribute\RenameSlot(original: 'altText', new: 'alt')]
#[Slots\Attribute\RenameSlot(original: 'loadingType', new: 'loading')]
class Image extends CommonComponent\Media\Image\Image implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('source', $this->source)
      ->set('altText', $this->altText)
      ->set('width', $this->width)
      ->set('height', $this->height)
      ->set('loadingType', \strtolower($this->loadingType->name))
      ->set('sources', \array_map(static function (ImageSource $source): array {
              // @todo
              return ['srcset' => '', 'type' => '', '?media' => NULL];
      }, $this->sources));
  }

}
