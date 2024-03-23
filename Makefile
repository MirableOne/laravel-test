migrate:
	DB_HOST=localhost php artisan migrate

seed:
	DB_HOST=localhost php artisan db:seed --class=DatabaseSeeder

.PHONY: migrate seed
