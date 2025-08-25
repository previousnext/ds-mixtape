# This Makefile is intended for use when used in the split, not the monorepo.
test-setup:
	cp .ci/.env .env
	mkdir -p output/html

test:
	XDEBUG_MODE=coverage vendor/bin/paratest --configuration phpunit.xml

phpstan:
	php -d memory_limit=-1 ./vendor/bin/phpstan analyze --no-progress

phpstan-baseline:
	php -d memory_limit=-1 ./vendor/bin/phpstan analyse --memory-limit=-1 --generate-baseline=./phpstan-baseline.php
