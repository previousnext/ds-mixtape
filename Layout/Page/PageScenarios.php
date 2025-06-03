<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Page;

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

}
