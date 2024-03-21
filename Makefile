migrate:
	DB_HOST=localhost php artisan migrate

seed:
	DB_HOST=localhost php artisan db:seed

.PHONY: migrate seed
