<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

use Drupal\Core\Render\Markup;
use Drupal\Core\Url;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Component;
use PreviousNext\Ds\Common\Layout\Grid\Grid;
use PreviousNext\Ds\Common\Layout\Grid\GridItem;
use PreviousNext\Ds\Common\Layout\Grid\GridType;
use PreviousNext\IdsTools\Scenario\Scenario;

final class GridScenarios {

  #[Scenario(viewPortWidth: 1000, viewPortHeight: 800)]
  final public static function cardGrid(): \Generator {
    $url = \Mockery::mock(Url::class);
    $url->expects('toString')->andReturn('http://example.com/');

    foreach ([
       [GridColumnSizeModifier::ExtraLarge2, 2],
       [GridColumnSizeModifier::Large3, 3],
       [GridColumnSizeModifier::Medium4, 4],
       [GridColumnSizeModifier::Medium3, 3],
       [GridColumnSizeModifier::Medium3, 6],
    ] as [$gridColumnSizeModifier, $cardQuantity]) {
      $instance = Grid::create(as:GridType::Div, gridItemDefaultType: GridItem\GridItemType::Div);
      $instance->modifiers[] = GridColumnSizeModifier::Medium3;

      for ($i = 0; $i < $cardQuantity; $i++) {
        $instance[] = Component\Card\Card::create(
          image: Component\Media\Image\Image::createSample(558, 418),
          links: Component\LinkList\LinkList::create([
            Atom\Link\Link::create(title: 'zz', url: $url),
          ]),
          date: new \DateTimeImmutable('1st January 2001'),
          content: Atom\Html\Html::create(Markup::create(<<<MARKUP
            <p>
              Ut ad venenatis habitasse parturient parturient etiam ridiculus at ullamcorper condimentum in phasellus nisi dis a.
            </p>
            MARKUP)),
          link: Atom\Link\Link::create(title: 'Card Link!', url: $url),
        )();
      }

      yield \sprintf('%sx%s', $gridColumnSizeModifier->name, $cardQuantity) => $instance;
    }
  }

}
