php 8.3
php artisan make:migration change_users_table
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateAdminUserSeeder
php artisan make:migration create_futers_table
