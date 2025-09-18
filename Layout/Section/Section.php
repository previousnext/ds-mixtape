<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('section.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
#[Slots\Attribute\RenameSlot(original: 'isContainer', new: 'container')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([
  CommonLayouts\Section\SectionScenarios::class,
  SectionScenarios::class,
])]
class Section extends CommonLayouts\Section\Section implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    $sectionBackground = $this->modifiers->getFirstInstanceOf(SectionBackground::class);

    $modifiers = [];
    foreach ($this->modifiers->getInstancesOf(SectionSize::class) as $sectionSize) {
      $modifiers[] = $sectionSize->modifierName();
    }
    foreach ($this->modifiers->getInstancesOf(SectionWidth::class) as $sectionWidth) {
      $modifiers[] = $sectionWidth->modifierName();
    }

    $content = $this->map(static function (CommonLayouts\Section\SectionItem $item): mixed {
      return \is_callable($item->content) ? ($item->content)() : $item->content;
    })->toArray();

    return parent::build($build)
      ->set('background', $sectionBackground?->modifierName())
      ->set('isContainer', $this->isContainer)
      ->set('content', $content)
      ->set('link', $this->link)
      ->set('heading', $this->heading)
      ->set('modifiers', $modifiers)
      ->set('as', $this->as->element());
  }

}
