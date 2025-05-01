<?php

declare(strict_types=1);

namespace PreviousNext\Ds\Mixtape\List;

use Pinto\Attribute\Definition;
use PreviousNext\Ds\Mixtape\Component;
use PreviousNext\Ds\Mixtape\Utility\Twig;
use PreviousNext\Ds\Common\List\ListTrait;

use function Safe\realpath;

trait MixtapeListTrait
{
    use ListTrait;

    final public function templateName(): string
    {
        // Cap names to hyphen between, then remove leading hyphen.
        return \strtolower(ltrim(\preg_replace_callback('/[A-Z]/', function ($matches) {
            return '-' . $matches[0];
        }, $this->name) ?? '', '-'));
    }

    final public function templateDirectory(): string
    {
        // Template directory relative to /data/ids/interchangeable-ds/components/design-system
        // See \Drupal\pnx_ds_mixtape\Hook\Hooks::systemInfoAlter().
        return sprintf('@%s/%s', Twig::Namespace, $this->dsDirectory());
    }

    private function mixtapeAssetDir(): string
    {
        $pathFromDrupalRoot = realpath(sprintf('%s/../ids/interchangeable-ds/assets', \DRUPAL_ROOT));
        $definition = ((new \ReflectionEnumUnitCase($this::class, $this->name))->getAttributes(Definition::class)[0] ?? null)?->newInstance();
        if (null === $definition) {
            return $pathFromDrupalRoot;
        }

        return sprintf('%s/%s', $pathFromDrupalRoot, $this->dsDirectory());
    }

    private function dsDirectory(): string
    {
        $enum = $this;

        $categoryDirectory = match (\get_class($this)) {
            MixtapeAtoms::class => 'Atom',
            MixtapeLayouts::class => 'Layout',
            MixtapeComponents::class => 'Component',
            default => throw new \LogicException('Unhandled ' . static::class),
        };

        if (\str_ends_with($this->name, 'Item')) {
            // If the enum name ends with 'Item', just get the non-prefixed 'Item'-less enum.
            // E.g `AccordionItem` resolves to `Accordion`.
            /** @var static $enum */
            $enum = $this::{\substr($this->name, 0, strlen('Item') * -1)};
        }

        return $categoryDirectory . '/' . $enum->name;
    }
}
