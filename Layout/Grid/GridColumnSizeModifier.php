<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\Layout\Grid;

use PreviousNext\Ds\Common\Layout\Grid\GridModifierInterface;

/**
 * Size modifier.
 */
enum GridColumnSizeModifier implements GridModifierInterface
{
    case ExtraLarge_2;
    case ExtraLarge_3;
    case ExtraLarge_4;
    case ExtraSmall_2;
    case Large_2;
    case Large_3;
    case Large_4;
    case Medium_2;
    case Medium_3;
    case Medium_4;
    case Small_2;

    /**
     * Combined in grid.twig `baseClass . '--cols-' . classPart` in grid.twig to produce a size class.
     */
    public function classPart(): string
    {
        return match ($this) {
            self::ExtraLarge_2 => 'xl-2',
            self::ExtraLarge_3 => 'xl-3',
            self::ExtraLarge_4 => 'xl-4',
            self::ExtraSmall_2 => 'xs-2',
            self::Large_2 => 'lg-2',
            self::Large_3 => 'lg-3',
            self::Large_4 => 'lg-4',
            self::Medium_2 => 'md-2',
            self::Medium_3 => 'md-3',
            self::Medium_4 => 'md-4',
            self::Small_2 => 'sm-2',
        };
    }
}
