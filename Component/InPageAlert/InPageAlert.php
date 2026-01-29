<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\InPageAlert;

use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom\Html\Html;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('in-page-alert.css', preprocess: FALSE)]
#[Slots\Attribute\ModifySlots(add: [
  // Unique to Mixtape:
  'closable',
])]
#[Scenarios([CommonComponent\InPageAlert\InPageAlertScenarios::class])]
#[Slots\Attribute\RenameSlot(original: 'heading', new: 'title')]
class InPageAlert extends CommonComponent\InPageAlert\InPageAlert implements Utility\MixtapeObjectInterface {
  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('heading', $this->heading)
      ->set('content', Html::createFromCollection($this))
      ->set('link', $this->link)
      ->set('type', \strtolower($this->type->name))
      ->set('closable', TRUE);
  }

}
