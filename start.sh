mysql -u root -p -e "create database jojonomicwoka" 
php artisan make:migration produk
php artisan make:migration user1
php artisan make:migration rents
php artisan migrate
php artisan db:seed
php -S localhost:8000 -t public

