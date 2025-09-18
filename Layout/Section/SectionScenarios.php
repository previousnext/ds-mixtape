<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Section;

use Drupal\Core\Render\Markup;
use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Layout;

final class SectionScenarios {

  final public static function sectionBackgrounds(): \Generator {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    foreach (SectionBackground::cases() as $sectionBackground) {
      $instance = Layout\Section\Section::create(
        heading: 'Section title',
        as: Layout\Section\SectionType::Section,
      );
      $instance[] = Atom\Html\Html::create(Markup::create('<div>Section <strong>contents</strong></div>'));
      $instance->modifiers[] = $sectionBackground;
      yield $sectionBackground->name => $instance;
    }
  }

  final public static function sectionSizing(): \Generator {
    foreach (SectionSize::cases() as $sectionSize) {
      $instance = Layout\Section\Section::create(
        heading: 'Section title',
        as: Layout\Section\SectionType::Section,
      );
      $instance[] = Atom\Html\Html::create(Markup::create('<div>Section <strong>contents</strong></div>'));
      $instance->modifiers[] = $sectionSize;
      yield $sectionSize->name => $instance;
    }
  }

  final public static function sectionWidth(): \Generator {
    foreach (SectionWidth::cases() as $sectionWidth) {
      $instance = Layout\Section\Section::create(
        heading: 'Section title',
        as: Layout\Section\SectionType::Section,
      );
      $instance[] = Atom\Html\Html::create(Markup::create('<div>Section <strong>contents</strong></div>'));
      $instance->modifiers[] = $sectionWidth;
      yield $sectionWidth->name => $instance;
    }
  }

}
