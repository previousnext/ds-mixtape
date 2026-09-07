<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Tags\TagItem;

use Drupal\Core\Template\Attribute;
use Pinto\Attribute\ObjectType;
use Pinto\Slots;
use PreviousNext\Ds\Common\Component\Tags\CheckboxTag;
use PreviousNext\Ds\Common\Component\Tags\LinkTag;
use PreviousNext\Ds\Common\Component\Tags\Tag;
use PreviousNext\Ds\Common\Utility as CommonUtility;
use PreviousNext\Ds\Common\Utility\Twig as CommonTwig;
use PreviousNext\Ds\Mixtape\Component\Tags\TagTypes;
use PreviousNext\Ds\Mixtape\Utility;

#[ObjectType\Slots(slots: [
  'item',
  'type',
  'tagAttributes',
  'dismissible',
  'removeLabel',
  // PnxCommonHooks::RENDER_ARRAY_KEY_TO_TWIG_TYPE:
  '__twigTypeVar',
])]
final class TagItem implements Utility\MixtapeObjectInterface {

  use Utility\ObjectTrait;
  use CommonUtility\ObjectTrait;

  final private function __construct(
    public string|Tag|CheckboxTag|LinkTag $item,
    public TagTypes $type,
    public Attribute $tagAttributes,
    public bool $dismissible,
    public ?string $removeLabel,
  ) {
  }

  /**
   * @internal for internal use, always use Tags to create the component instead.
   */
  public static function create(
    string|Tag|CheckboxTag|LinkTag $item,
    TagTypes $type,
    ?Attribute $tagAttributes = NULL,
    bool $dismissible = FALSE,
    ?string $removeLabel = NULL,
  ): static {
    return static::factoryCreate(
      item: $item,
      type: $type,
      tagAttributes: $tagAttributes ?? new Attribute(),
      dismissible: $dismissible,
      removeLabel: $removeLabel,
    );
  }

  protected function build(Slots\Build $build): Slots\Build {
    return $build
      ->set('item', $this->item)
      ->set('tagAttributes', $this->tagAttributes)
      ->set('dismissible', $this->dismissible)
      ->set('removeLabel', $this->removeLabel)
      // Cant use 'type' directly as Drupal uses #type, which causes our object to be both a theme and a type. The '#type' is nulled then set in a preprocessor.
      ->set('type', CommonTwig::hasRenderPreprocessing() ? NULL : $this->type->typeName())
      ->set('__twigTypeVar', $this->type->typeName());
  }

}
