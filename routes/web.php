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
//     return ('Hello World!');
// });


$router->get('/', function(){
    return 'Hello World';
});

// $router->get('user/{id}', 'userController@show');

$router->group(['prefix'=>'user'], function() use($router){
    $router->get('all', 'UserController@index');
    $router->post('add', 'UserController@store');
});

$router->group(['prefix'=>'posts'], function () use($router){
    $router->get('/', 'PostController@getAllPost');
    $router->get('/{id}', 'PostController@getPost');
    $router->post('/', 'PostController@addPost');
    $router->put('/{id}', 'PostController@editPost');
    $router->delete('/{id}', 'PostController@deletePost');
});