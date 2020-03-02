<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'fullname'  => "Woka Aditama",
            'email' => "woka'@alterra.id",
            'password'  => "$2y$10$J.ikXagDuzflQnKsuUF82.XkmQvwQHVdCSTNSuR3JDPYqUZB3xnua"
    ]);
    
       \App\Produk::create([
            'title'  => "yUI bOND",
            'rate' => 5,
            'category'  => "Non-Fiction",
            'price'=> 20000,
            'quantity'=>3
    ]);
        // $this->call('UsersTableSeeder');
    }
}
