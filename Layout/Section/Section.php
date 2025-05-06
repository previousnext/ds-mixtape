<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Mixtape\Utility;

/**
 * @see https://mixtape.pnx.io/section-layout.html#kssref-layout-section
 */
#[Css('section.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
#[Slots\Attribute\RenameSlot(original: 'isContainer', new: 'container')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
class Section extends CommonLayouts\Section\Section implements Utility\MixtapeObjectInterface {
  // @todo: mixtape has a `background` var.
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
          // @todo section.twig doesnt have background?
          //   ->set('background', $this->background)
      ->set('background', NULL)
      ->set('isContainer', $this->isContainer)
      ->set('content', $this->content?->markup)
      ->set('link', $this->link)
      ->set('heading', $this->heading?->heading)
      ->set('modifiers', [])
      ->set('as', $this->as->element());
  }

}
