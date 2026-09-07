<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Tags;

use Drupal\Core\Template\Attribute;
use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Atom\Html\Html;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

/**
 * @template T of CommonComponent\Tags\Tag|CommonComponent\Tags\CheckboxTag|CommonComponent\Tags\LinkTag = CommonComponent\Tags\Tag|CommonComponent\Tags\CheckboxTag|CommonComponent\Tags\LinkTag
 * @extends CommonComponent\Tags\Tags<T>
 */
#[Css('tag.css', preprocess: FALSE)]
#[Slots\Attribute\RenameSlot(original: 'tags', new: 'items')]
#[Slots\Attribute\RenameSlot(original: 'containerAttributes', new: 'attributes')]
#[Scenarios([
  CommonComponent\Tags\TagsScenarios::class,
  TagsScenarios::class,
])]
class Tags extends CommonComponent\Tags\Tags implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  public TagTypes $tagType;
  public Attribute $tagAttributes;
  public bool $dismissible;
  public ?string $removeLabel;

  protected function build(Slots\Build $build): Slots\Build {
    $this->tagType ??= TagTypes::Text;
    $this->dismissible ??= FALSE;
    $this->removeLabel ??= NULL;

    $items = $this->map(function (CommonComponent\Tags\Tag|CommonComponent\Tags\CheckboxTag|CommonComponent\Tags\LinkTag $tag): TagItem\TagItem {
      $item = $this->tagType === TagTypes::Text
        ? match (TRUE) {
          $tag instanceof CommonComponent\Tags\Tag => $tag->title,
          $tag instanceof CommonComponent\Tags\CheckboxTag => $tag->label,
          $tag instanceof CommonComponent\Tags\LinkTag => $tag->title,
        }
        : $tag;

      return TagItem\TagItem::create(
        item: $item,
        type: $this->tagType,
        // Clone so each item gets its own attribute bag; the twig template
        // mutates it (adds classes) on render.
        tagAttributes: clone ($this->tagAttributes ?? new Attribute()),
        dismissible: $this->dismissible,
        removeLabel: $this->removeLabel,
      );
    })->toArray();

    return $build
      ->set('tags', Html::createFromCollection($items));
  }

}
