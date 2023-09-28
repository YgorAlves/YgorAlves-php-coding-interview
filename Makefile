up:
	docker-compose up -d --build

stop:
	docker-compose stop

down:
	docker-compose down

shell:
	docker-compose exec php /bin/sh

init:
	docker-compose exec php composer install

test:
	docker-compose exec php ./vendor/bin/phpunit tests/