<?php

declare(strict_types=1);

/**
 * @var \Composer\Autoload\ClassLoader $loader */
$loader = require __DIR__ . '/vendor/autoload.php';

$drupalPintoDependencies = [
  'pinto',
  'pinto_block',
];
foreach ($drupalPintoDependencies as $drupalPintoDependency) {
  $loader->addPsr4(\sprintf('Drupal\%s\\', $drupalPintoDependency), sprintf('%s/vendor/drupal/%s/src', __DIR__, $drupalPintoDependency));
}
