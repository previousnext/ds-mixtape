<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\Tags;

use PreviousNext\Ds\Common\Component as CommonComponents;

final class TagsScenarios {

  final public static function tagTypeLink(): Tags {
    /** @var Tags $tags */
    $tags = CommonComponents\Tags\Tags::create();
    $tags->tagType = TagTypes::Link;
    $tags[] = CommonComponents\Tags\LinkTag::create('Tag 1', href: 'http://example.com/');
    $tags[] = CommonComponents\Tags\LinkTag::create('Tag 2', href: 'http://example.com/');
    $tags[] = CommonComponents\Tags\LinkTag::create('Tag 3', href: 'http://example.com/');
    return $tags;
  }

  final public static function tagTypeCheckbox(): Tags {
    /** @var Tags<CommonComponents\Tags\CheckboxTag> $tags */
    $tags = CommonComponents\Tags\Tags::create();
    $tags->tagType = TagTypes::Checkbox;
    for ($i = 0; $i < 3; $i++) {
      $tags[] = CommonComponents\Tags\CheckboxTag::create(
        checkboxName: 'foo-checkboxes',
        checkboxValue: 'value-' . $i,
        label: 'Tag ' . $i,
      );
    }
    $tags[1]->checked = TRUE;
    return $tags;
  }

}
