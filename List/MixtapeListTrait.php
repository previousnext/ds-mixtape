<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use PreviousNext\Ds\Common\List\ListTrait;
use PreviousNext\Ds\Common\Utility\TemplateDirectory;
use PreviousNext\Ds\Common\Utility\TemplateFile;
use PreviousNext\Ds\Mixtape\Utility\Twig;

trait MixtapeListTrait {

  use ListTrait;

  final public function templateName(): string {
    $customTemplateFile = ((new \ReflectionEnumUnitCase($this::class, $this->name))->getAttributes(TemplateFile::class)[0] ?? NULL)?->newInstance();
    if ($customTemplateFile !== NULL) {
      return $customTemplateFile->fileName;
    }

    // Cap names to hyphen between, then remove leading hyphen.
    return \strtolower(\ltrim(\preg_replace_callback('/[A-Z]/', static function ($matches) {
      return '-' . $matches[0];
    }, $this->name) ?? '', '-'));
  }

  final public function templateDirectory(): string {
    // Template directory relative to /data/components/design-system
    // See \Drupal\pnx_ds_mixtape\Hook\Hooks::systemInfoAlter().
    return \sprintf('@%s/%s', Twig::NAMESPACE, $this->dsDirectory());
  }

  private function dsDirectory(): string {
    $customTemplateDirectory = ((new \ReflectionEnumUnitCase($this::class, $this->name))->getAttributes(TemplateDirectory::class)[0] ?? NULL)?->newInstance();
    if ($customTemplateDirectory !== NULL) {
      return $customTemplateDirectory->path;
    }

    $enum = $this;

    $categoryDirectory = match (\get_class($this)) {
      MixtapeAtoms::class => 'Atom',
      MixtapeLayouts::class => 'Layout',
      MixtapeComponents::class => 'Component',
      default => throw new \LogicException('Unhandled ' . static::class),
    };

    if (\str_ends_with($this->name, 'Item')) {
      // If the enum name ends with 'Item', just get the non-prefixed
      // 'Item'-less enum.
      // E.g `AccordionItem` resolves to `Accordion`.
      $name = \substr($this->name, 0, \strlen('Item') * -1);

      // Plurality allows for TabItem -> Tabs.
      /** @var static $enum */
      $enum = \defined($this::class . '::' . $name) ? $this::{$name} : $this::{$name . 's'};
    }

    return $categoryDirectory . '/' . $enum->name;
  }

  public function cssDirectory(): string {
    return \Safe\realpath(\DRUPAL_ROOT) . '/libraries/mixtape';
  }

  public function jsDirectory(): string {
    return \Safe\realpath(\DRUPAL_ROOT) . '/libraries/mixtape';
  }

}
