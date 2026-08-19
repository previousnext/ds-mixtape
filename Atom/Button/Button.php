<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Atom\Button;

use Drupal\Core\Template\Attribute;
use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom as CommonAtom;
use PreviousNext\Ds\Common\Atom\Button\ButtonModifierInterface;
use PreviousNext\Ds\Common\Atom\Button\ButtonType;
use PreviousNext\Ds\Common\Modifier;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

#[Css('button.css', preprocess: TRUE)]
#[Scenarios([CommonAtom\Button\ButtonScenarios::class])]
#[Slots\Attribute\ModifySlots(add: [
  'modifiers',
])]
class Button extends CommonAtom\Button\Button implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  public static function createLink(
    string $title,
    ?string $href = NULL,
    ?CommonAtom\Button\ButtonStyle $style = NULL,
    ?CommonAtom\Button\ButtonLayout $layout = NULL,
    ?CommonAtom\Icon\Icon $iconStart = NULL,
    ?CommonAtom\Icon\Icon $iconEnd = NULL,
  ): CommonAtom\Button\Button {
    $link = CommonAtom\Button\Button::factoryCreate(
      title: $title,
      href: $href,
      as: ButtonType::Link,
      disabled: FALSE,
      iconOnly: FALSE,
      iconStart: $iconStart,
      iconEnd: $iconEnd,
      modifiers: new Modifier\ModifierBag(ButtonModifierInterface::class),
      containerAttributes: new Attribute(),
    );
    foreach (\array_filter([$style, $layout]) as $modifier) {
      $link->modifiers[] = $modifier;
    }
    return $link;
  }

  protected function build(Slots\Build $build): Slots\Build {
    $as = \strtolower(match ($this->as) {
      // Define all cases so we are notified by PHPStan if a new one is added
      // upstream.
      ButtonType::Button, ButtonType::Input, ButtonType::Link, ButtonType::Reset, ButtonType::Submit => $this->as->name,
    });

    $modifiers = [];
    if (NULL !== ($buttonStyle = $this->modifiers->getFirstInstanceOf(CommonAtom\Button\ButtonStyle::class))) {
      $modifiers[] = match ($buttonStyle) {
        // Suffixes for 'mx-button--' in button.twig.
        CommonAtom\Button\ButtonStyle::Dark => 'dark',
        CommonAtom\Button\ButtonStyle::Destructive => 'destructive',
        CommonAtom\Button\ButtonStyle::Light => 'light',
        CommonAtom\Button\ButtonStyle::Outline => 'outline',
        CommonAtom\Button\ButtonStyle::White => 'white',
      };
    }

    if (NULL !== ($buttonLayout = $this->modifiers->getFirstInstanceOf(CommonAtom\Button\ButtonLayout::class))) {
      $modifiers[] = match ($buttonLayout) {
        // Suffixes for 'mx-button--' in button.twig.
        CommonAtom\Button\ButtonLayout::FullWidth => 'full-width',
      };
    }

    return parent::build($build)
      ->set('title', $this->title)
      ->set('href', $this->href)
      ->set('as', $as)
      ->set('modifiers', $modifiers);
  }

}
