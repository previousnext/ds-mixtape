<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Card;

use Drupal\Core\Render\Markup;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Component as CommonComponents;
use PreviousNext\IdsTools\Scenario\Scenario;

final class CardScenarios {

  #[Scenario(viewPortWidth: 1000, viewPortHeight: 500)]
  final public static function cardLayouts(): \Generator {
    // @todo put in a section.
    foreach (CardLayout::cases() as $cardLayout) {
      /** @var Card $card */
      $card = CommonComponents\Card\Card::create(
        image: CommonComponents\Media\Image\Image::createSample(256, 256),
        links: NULL,
        heading: CommonAtoms\Heading\Heading::create('Example!', CommonAtoms\Heading\HeadingLevel::Two),
        content: CommonAtoms\Html\Html::create(Markup::create(<<<MARKUP
          <p>Lorem ipsum.</p>
          MARKUP)),
      );
      $card->modifiers[] = $cardLayout;
      yield $cardLayout->name => $card;
    }
  }

}
