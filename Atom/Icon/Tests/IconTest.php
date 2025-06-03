<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Common\Component\Card\Tests;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use PHPUnit\Framework\TestCase;
use PreviousNext\Ds\Common\Atom as CommonAtoms;
use PreviousNext\Ds\Common\List\CommonLists;
use PreviousNext\Ds\Mixtape\Atom;
use PreviousNext\Ds\Mixtape\List\MixtapeLists;
use PreviousNext\Ds\Nsw\Lists\NswLists;
use PreviousNext\IdsTools\DependencyInjection\IdsContainer;

class IconTest extends TestCase {

  protected function setUp(): void {
    parent::setUp();
    $container = new ContainerBuilder();
    $container->setParameter('ids.design_system', 'mixtape');
    $container->setParameter('ids.design_system.additional', ['common']);
    $container->setParameter('ids.design_systems', [
      'mixtape' => MixtapeLists::Lists,
      'nsw' => NswLists::Lists,
      'common' => CommonLists::Lists,
    ]);
    IdsContainer::setupContainer($container);
    $container->compile();
  }

  /**
   * @covers \PreviousNext\Ds\Mixtape\Atom\Icon\Icon::createMixtapeIcon
   */
  public function testCreateMixtapeIcon(): void {
    $icon = CommonAtoms\Icon\Icon::create();

    // Ensure we got Mixtapes icon class as we are testing Mixtapes build.
    static::assertInstanceOf(Atom\Icon\Icon::class, $icon);

    $icon = Atom\Icon\Icon::createMixtapeIcon(Atom\Icon\Icons::Drupal, Atom\Icon\IconSize::ExtraLarge);
    $build = $icon();
    static::assertEquals('drupal', $build['#icon']);
    // Ensure the icon didn't end up as another class in the attributes object, and only the size did:
    // @phpstan-ignore-next-line
    static::assertEquals(' class="mx-icon--size-xl"', (string) $build['#attributes']);
  }

}
