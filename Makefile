all: install lint check test

install:
	@composer install

lint:
	@composer phpcbf

check:
	@composer phpstan; \
	composer phpcs

test:
	@composer phpunit
