<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Common\Component\Card\Tests;

use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\TestCase;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Mixtape\Atom;
use PreviousNext\Ds\Mixtape\Atom\Icon\Icon;
use PreviousNext\IdsTools\DependencyInjection\IdsContainer;

#[CoversMethod(Icon::class, 'createMixtapeIcon')]
class IconTest extends TestCase {

  protected function setUp(): void {
    parent::setUp();

    IdsContainer::testContainerForDs('mixtape');
  }

  public function testCreateMixtapeIcon(): void {
    $icon = CommonAtoms\Icon\Icon::create();

    // Ensure we got Mixtapes icon class as we are testing Mixtapes build.
    static::assertInstanceOf(Icon::class, $icon);

    $icon = Icon::createMixtapeIcon(Atom\Icon\Icons::Drupal, Atom\Icon\IconSize::ExtraLarge);
    $build = $icon();
    static::assertEquals('drupal', $build['#icon']);
    // Ensure the icon didn't end up as another class in the attributes object, and only the size did:
    // @phpstan-ignore-next-line
    static::assertEquals(' class="mx-icon--size-xl"', (string) $build['#attributes']);
  }

}
