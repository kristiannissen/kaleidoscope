### Commands
php artisan make:test UserTest // Create a test in the Feature directory
php artisan make:test UserTest --unit // Create a test in the Unit directory
php artisan make:model Flight --migration // Create model with migration
php artisan migrate // Migrate all

### Seeders
php artisan make:seeder UserSeeder // Create a new seeder
composer dump-autoload
php artisan db:seed // Run seeders
php artisan db:seed --class=UserSeeder // Run specific seeder
php artisan migrate:fresh --seed // Drop DB, run migrations and seeders
