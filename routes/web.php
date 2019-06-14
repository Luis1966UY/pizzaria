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

$router->get('/pizzas', 'PizzaController@index');
$router->post('/pizzas', 'PizzaController@store');
$router->get('/pizzas/{pizzas}', 'PizzaController@show');
$router->put('/pizzas/{pizzas}', 'PizzaController@update');
$router->patch('/pizzas/{pizzas}', 'PizzaController@update');
$router->delete('/pizzas/{pizzas}', 'PizzaController@destroy');

$router->get('/clientes', 'ClienteController@index');
$router->post('/clientes', 'ClienteController@store');
$router->get('/clientes/{clientes}', 'ClienteController@show');
$router->put('/clientes/{clientes}', 'ClienteController@update');
$router->patch('/clientes/{clientes}', 'ClienteController@update');
$router->delete('/clientes/{clientes}', 'ClienteController@destroy');

$router->get('/pedidos', 'PedidoController@index');
$router->get('/pedidos/{pedidos}', 'PedidoController@show');

$router->get('/clientes/{clientes}/pedidos', 'ClientePedidoController@index');
$router->post('/clientes/{clientes}/pedidos', 'ClientePedidoController@store');
$router->put('/clientes/{clientes}/pedidos/{pedidos}', 'ClientePedidoController@update');
$router->patch('/clientes/{clientes}/pedidos/{pedidos}', 'ClientePedidoController@update');
$router->delete('/clientes/{clientes}/pedidos/{pedidos}', 'ClientePedidoController@destroy');

$router->get('/pedidos/{pedidos}/pizzas', 'PedidoPizzaController@index');
$router->post('/pedidos/{pedidos}/pizzas/{pizzas}', 'PedidoPizzaController@store');
$router->delete('/pedidos/{pedidos}/pizzas/{pizzas}', 'PedidoPizzaController@destroy');