start:
	docker compose up -d
build:
	docker compose up -d --build
down:
	docker compose down
phpstan:
	docker compose exec php vendor/bin/phpcs
phplint:
	docker compose exec php vendor/bin/phplint
phpunit:
	docker compose exec php vendor/bin/phpunit