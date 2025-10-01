<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Tags;

use Drupal\Core\Template\Attribute;
use Pinto\Attribute\Asset\Css;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component as CommonComponent;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\IdsTools\Scenario\Scenarios;

/**
 * @template T of CommonComponent\Tags\Tag|CommonComponent\Tags\CheckboxTag|CommonComponent\Tags\LinkTag = CommonComponent\Tags\Tag|CommonComponent\Tags\CheckboxTag|CommonComponent\Tags\LinkTag
 * @extends CommonComponent\Tags\Tags<T>
 */
#[Css('tag.css', preprocess: TRUE)]
#[Slots\Attribute\RenameSlot(original: 'tags', new: 'items')]
#[Slots\Attribute\ModifySlots(add: [
  // Cant use 'type' directly as Drupal uses #type, which causes our object to be both a theme and a type. The '#type' is nulled then set in a preprocessor.
  'type',
  // PnxCommonHooks::RENDER_ARRAY_KEY_TO_TWIG_TYPE:
  '__twigTypeVar',
  // Add a new attributes slot for individual items.
  'attributes',
])]
#[Scenarios([
  CommonComponent\Tags\TagsScenarios::class,
  TagsScenarios::class,
])]
class Tags extends CommonComponent\Tags\Tags implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;

  public TagTypes $tagType;
  public Attribute $tagAttributes;

  protected function build(Slots\Build $build): Slots\Build {
    $this->tagType ??= TagTypes::Text;

    $tags = $this->map(function (CommonComponent\Tags\Tag|CommonComponent\Tags\CheckboxTag|CommonComponent\Tags\LinkTag $tag): mixed {
      return $this->tagType === TagTypes::Text
        ? match (TRUE) {
          $tag instanceof CommonComponent\Tags\Tag => $tag->title,
          $tag instanceof CommonComponent\Tags\CheckboxTag => $tag->label,
          $tag instanceof CommonComponent\Tags\LinkTag => $tag->title,
        }
        : $tag;
    })->toArray();

    return $build
      ->set('tags', $tags)
      ->set('attributes', match ($this->tagType) {
        // Checkboxes, $tagAttributes is unused; reserved for future use.
        TagTypes::Checkbox => $this->containerAttributes,
        // Text and Link do not have an overall container. $containerAttributes is unused.
        TagTypes::Text, TagTypes::Link => $this->tagAttributes ?? new Attribute(),
      })
      // Same type for all items, maybe it should be per tag?
      // Cant pass this as '#type' is reserved in Drupal.
      // When running outside of Drupal, type should be set as preprocessor won't work.
      ->set('type', \class_exists(\Drupal::class) ? $this->tagType->typeName() : NULL)
      ->set('__twigTypeVar', $this->tagType->typeName());
  }

}
