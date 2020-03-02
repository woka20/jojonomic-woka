<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });

// 'middleware' => 'auth'
$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function() use ($router)
{
  $router->post('product','ProductsControl@postProduct');
  $router->put('product/{id}','ProductsControl@updateProduct');
    
  $router->delete('product/{id}','ProductsControl@deleteProduct');
  $router->put('rent/{id}', 'RentsControl@updateRent');
  $router->delete('user/{id}','UsersControl@deleteUser');
  $router->get('rent', 'RentsControl@getRent');
});

$router->group(['prefix' => 'api/v2'], function() use ($router)
{
  $router->post('register','UsersControl@register');
  $router->post('login','UsersControl@login');
});

$router->group(['prefix'=> 'api/v3'], function() use ($router)
{
  $router->post('rent','RentsControl@orderRent');
  $router->get('product','ProductsControl@getProduct');
});