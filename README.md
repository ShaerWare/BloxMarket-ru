php 8.3
php artisan make:migration change_users_table
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateAdminUserSeeder
php artisan make:migration create_futers_table

3D Модели должны быть в формате .fbx, .gltf, .obj

Платёжные системы:

Gmpays
https://cp.gmpays.com/apidoc?gmlang=en
https://github.com/gamemoney-ps/gamemoney-php-sdk

Payselection
https://api.payselection.com/
https://github.com/Payselection/Payselection-PayApp-SDK-PHP
