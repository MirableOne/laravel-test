migrate:
	docker-compose build build && docker-compose run build php artisan migrate

seed:
	docker-compose build build && docker-compose run build php artisan db:seed --class=DatabaseSeeder

.PHONY: migrate seed
