<?php declare(strict_types = 1);

$ignoreErrors = [];
$ignoreErrors[] = [
	'message' => '#^Parameter \\#1 \\$array \\(array\\{\\}\\) to function array_values is empty, call has no effect\\.$#',
	'identifier' => 'arrayValues.empty',
	'count' => 1,
	'path' => __DIR__ . '/Layout/Grid/GridItem/GridItem.php',
];
$ignoreErrors[] = [
	'message' => '#^PreviousNext\\\\Ds\\\\Common\\\\Layout\\\\Grid\\\\Grid does not accept array\\<string, array\\<string, int\\>\\>\\.$#',
	'identifier' => 'offsetAssign.valueType',
	'count' => 1,
	'path' => __DIR__ . '/Layout/Grid/GridScenarios.php',
];
$ignoreErrors[] = [
	'message' => '#^PHPDoc tag @var for constant PreviousNext\\\\Ds\\\\Mixtape\\\\List\\\\MixtapeLists\\:\\:Lists with type class\\-string\\<Pinto\\\\List\\\\ObjectListInterface\\> is incompatible with value array\\{\'PreviousNext\\\\\\\\Ds\\\\\\\\Mixtape\\\\\\\\List\\\\\\\\MixtapeAtoms\', \'PreviousNext\\\\\\\\Ds\\\\\\\\Mixtape\\\\\\\\List\\\\\\\\MixtapeComponents\', \'PreviousNext\\\\\\\\Ds\\\\\\\\Mixtape\\\\\\\\List\\\\\\\\MixtapeGlobal\', \'PreviousNext\\\\\\\\Ds\\\\\\\\Mixtape\\\\\\\\List\\\\\\\\MixtapeLayouts\'\\}\\.$#',
	'identifier' => 'classConstant.phpDocType',
	'count' => 1,
	'path' => __DIR__ . '/List/MixtapeLists.php',
];
return ['parameters' => ['ignoreErrors' => $ignoreErrors]];
