<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Header;

use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\Atom\LinkedImage\LinkedImage;
use PreviousNext\Ds\Common\Vo\MenuTree\MenuTree;
use Ramsey\Collection\Collection;
use Ramsey\Collection\CollectionInterface;

/**
 * @phpstan-require-implements \PreviousNext\Ds\Mixtape\Utility\MixtapeObjectInterface
 */
trait HeaderTrait {

  /**
   * @phpstan-param \Ramsey\Collection\CollectionInterface<\PreviousNext\Ds\Common\Vo\MenuTree\MenuTree> $menu
   * @phpstan-param \Ramsey\Collection\CollectionInterface<\PreviousNext\Ds\Common\Atom\Button\Button> $controls
   */
  final private function __construct(
    protected LinkedImage $logo,
    protected ?string $title,
    protected ?string $description,
    protected bool $hasSearch,
    protected CollectionInterface $menu,
    protected CollectionInterface $controls,
  ) {
  }

  /**
   * Menu trees are passed in instead of Navigation component so DS can
   * initialise Navigation on its own.
   *
   * @phpstan-param iterable<CommonAtoms\Button\Button> $controls
   * @phpstan-param iterable<\PreviousNext\Ds\Common\Vo\MenuTree\MenuTree> $menu
   */
  final public static function create(
    LinkedImage $logo,
    ?string $title = NULL,
    ?string $description = NULL,
    bool $hasSearch = FALSE,
    iterable $menu = [],
    iterable $controls = [],
  ): static {
    /** @var \PreviousNext\Ds\Mixtape\Layout\Header\HeaderStandard\HeaderStandard */
    return static::factoryCreate(
      logo: $logo,
      title: $title,
      description: $description,
      hasSearch: $hasSearch,
      menu: new Collection(MenuTree::class, \iterator_to_array($menu)),
      controls: new Collection(CommonAtoms\Button\Button::class, \iterator_to_array($controls)),
    );
  }

}
