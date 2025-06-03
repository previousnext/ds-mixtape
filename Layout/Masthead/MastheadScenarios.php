<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Masthead;

use Drupal\Core\Render\Markup;
use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Atom\Link\Link;
use PreviousNext\Ds\Common\Layout\Masthead\Masthead;

final class MastheadScenarios {

  /**
   * @phpstan-return \Generator<\PreviousNext\Ds\Common\Layout\Masthead\Masthead>
   */
  final public static function masthead(): \Generator {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    /** @var \PreviousNext\Ds\Mixtape\Layout\Masthead\Masthead $instance */
    $instance = Masthead::create(
      content:  CommonAtoms\Html\Html::create(Markup::create(<<<MARKUP
        Welcome to the <strong>Jungle</strong> 🎸
        MARKUP)),
    );
    $instance->links[] = Link::create('Link 1', $url);
    $instance->links[] = Link::create('Link 2', $url);
    $instance->links[] = Link::create('Link 3', $url);
    $instance->skipLinks[] = Link::create('Skip Link 1', $url);
    $instance->skipLinks[] = Link::create('Skip Link 2', $url);
    $instance->containerAttributes['hello'] = 'world';
    $instance->containerAttributes['class'][] = 'foo';

    foreach (MastheadBackground::cases() as $background) {
      $i = clone $instance;
      $i->modifiers[] = $background;
      yield \sprintf('bg-%s', $background->name) => $i;
    }
  }

}
