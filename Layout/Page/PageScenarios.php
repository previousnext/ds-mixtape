<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Page;

use Drupal\Core\Render\Markup;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\IdsTools\Scenario\Scenario;

final class PageScenarios {

  #[Scenario(viewPortWidth: 1400, viewPortHeight: 1000)]
  final public static function page(): Page {
    /** @var Page $instance */
    $instance = Page::create(
      ['#markup' => 'Test Title!'],
      'Foo Bar',
    );
    $instance->containerAttributes['foo'] = 'bar';
    return $instance;
  }

  final public static function contentCollection(): Page {
    /** @var Page $instance */
    $instance = Page::create(
      ['#markup' => 'Test Title!'],
    );
    $instance[] = Atom\Html\Html::create(Markup::create(<<<MARKUP
        <p>Item 1.</p>
        MARKUP));
    $instance[] = Atom\Button\Button::create(title: 'Item 2', as: Atom\Button\ButtonType::Link);
    return $instance;
  }

}
