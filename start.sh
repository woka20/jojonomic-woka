mysql -u woka-ubuntu -p -e "create database woka1" 
php artisan make:migration produk1
php artisan make:migration users1
php artisan make:migration rents1
php artisan migrate
php -S localhost:8000 -t public

