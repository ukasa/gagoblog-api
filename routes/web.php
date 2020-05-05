<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    // return $router->app->version();
});

$router->get('/auth/check', 'AuthController@check');

$router->get('/posts', 'PostController@index');
$router->post('/posts', 'PostController@create');

$router->get('/tags', 'TagController@get_all');
$router->get('/tags/{id}', 'TagController@get_one');
$router->post('/tags', 'TagController@create');
$router->put('/tags/{id}', 'TagController@update');
$router->delete('/tags/{id}', 'TagController@delete');

$router->get('/assets/image/{filename}[.{extension}]', 'AssetController@image');
