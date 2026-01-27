<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Accordion\AccordionItem;

use Drupal\Core\Render\Markup;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom\Html\Html;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;

class AccordionItem extends CommonComponent\Accordion\AccordionItem\AccordionItem implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    $build = parent::build($build);

    if ($this->title === NULL || $this->title === '') {
      // Mixtape title must have something substantial otherwise the button will shift to the left.
      $build->set('title', Html::create(Markup::create('&nbsp;')));
    }

    return $build;
  }

}
