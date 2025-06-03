<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\SearchForm;

use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;
use Twig\Markup;

#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Slots\Attribute\RenameSlot(original: 'actionUrl', new: 'action')]
#[Scenarios([CommonComponent\SearchForm\SearchFormScenarios::class])]
class SearchForm extends CommonComponent\SearchForm\SearchForm implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  protected function build(Slots\Build $build): Slots\Build {
    return parent::build($build)
      ->set('input', new Markup(<<<HTML
        <input class="mx-input__text "
          id="search-keyword"
          name="search-form"
          type="search"
          value=""
          aria-label="Search by keywords"
          placeholder="Keywords..."
        />
        HTML, 'utf8'));
  }

}
