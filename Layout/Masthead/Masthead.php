<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Masthead;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Layout as CommonLayout;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('masthead.css', preprocess: TRUE)]
#[Scenarios([MastheadScenarios::class])]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
class Masthead extends CommonLayout\Masthead\Masthead implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('background', ($this->modifiers->getFirstInstanceOf(CommonLayout\Masthead\MastheadModifierInterface::class) ?? MastheadBackground::Dark)->background());
  }

}
