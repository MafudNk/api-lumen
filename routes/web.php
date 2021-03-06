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
//     // return $router->app->version();
//     return "halo lumen";
// });

/* menjalankan serv php -S localhost:8000 -t public */

$router->post('/product_create', 'ProductController@create');
$router->get('/product', 'ProductController@index');
$router->get('/product/{id}', 'ProductController@show');
$router->put('/product_update/{id}', 'ProductController@update');
$router->delete('product_delete/{id}', 'ProductController@destroy');

$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
