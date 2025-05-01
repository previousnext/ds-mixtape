<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Component\LinkList;

use Pinto\Attribute\Asset;
use Pinto\Slots;
use PreviousNext\Ds\Mixtape\Utility;
use PreviousNext\Ds\Common\Atom;
use PreviousNext\Ds\Common\Component as CommonComponent;

/**
 * @see https://mixtape.pnx.io/section-elements.html#kssref-elements-link-list
 */
#[Asset\Css('link-list.css', preprocess: true)]
class LinkList extends CommonComponent\LinkList\LinkList implements Utility\MixtapeObjectInterface
{
    use Utility\ObjectTrait;

    protected function build(Slots\Build $build): Slots\Build
    {
        return parent::build($build)
          ->set('items', \array_map(static function (Atom\Link\Link $link) {
              return [
                  'title' => $link instanceof Atom\Link\LinkWithLabel ? $link->label : $link->url,
                  'href' => $link->url,
              ];
          }, $this->toArray()))
        ;
    }
}
