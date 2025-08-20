<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Footer;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\Ds\Common\Layout as CommonLayouts;
use PreviousNext\Ds\Mixtape\Component\Navigation\NavigationType;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('footer.css', preprocess: TRUE)]
#[Scenarios([CommonLayouts\Footer\FooterScenarios::class])]
#[Slots\Attribute\ModifySlots(add: [
  'background',
])]
#[Slots\Attribute\RenameSlot(original: 'description', new: 'aoc')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
class Footer extends CommonLayouts\Footer\Footer implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    /** @var \PreviousNext\Ds\Mixtape\Component\Navigation\Navigation $navigation */
    $navigation = CommonComponents\Navigation\Navigation::create('id', 'Navigation');
    $navigation->navigationType = NavigationType::Footer;
    foreach ($this->menu as $menu) {
      $navigation[] = $menu;
    }

    $logos = \iterator_to_array($this->logos);

    return parent::build($build)
      // Set to NULL otherwise wrapper is added.
      ->set('navigation', \count($navigation) !== 0 ? $navigation : NULL)
      ->set('background', ($this->modifiers->getFirstInstanceOf(FooterBackground::class) ?? FooterBackground::Dark)->background())
      ->set('containerAttributes', $this->containerAttributes)
      ->set('logo', \array_shift($logos))
      ->set('socials', $this->socialLinks)
      ->set('modifiers', $this->modifiers)
      ->set('description', $this->description)
      ->set('copyright', $this->copyright);
  }

}
