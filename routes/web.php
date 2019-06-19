<?php

define("API_VERSION", 'v1');
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
    return $router->app->version() . ' - ' . 'Current API version: ' . API_VERSION;
});


$router->get('/key', function() {
    return str_random(32);
});


/** CORS */
$router->options(
    '/{any:.*}', [
    'middleware' => ['cors'],
    function () {
        return response('OK', 200);
    }
]);

/** Routes that doesn't require auth */
$router->group(['namespace' => API_VERSION, 'prefix' => API_VERSION, 'middleware' => 'cors'], function () use ($router) {
    $router->post('/login', ['uses' => 'UserController@login']);
    $router->post('/register', ['uses' => 'UserController@register']);
    $router->post('/verify', ['uses' => 'UserController@verify']);
    $router->post('/forgot-password', ['uses' => 'UserController@forgotPassword']);
    $router->post('/change-password', ['uses' => 'UserController@changePassword']);
    $router->get('/test', ['uses' => 'ItemController@test']);
    $router->get('/item/{id}', ['uses' => 'ItemController@getItem']);
    $router->get('/items/{id}', ['uses' => 'ItemController@getUsersItems']);
    $router->get('/search', ['uses' => 'ItemController@search']);
    $router->get('/categories', ['uses' => 'CategoryController@categories']);
    $router->get('/subcategories/{id}', ['uses' => 'SubcategoryController@subcategories']);
    $router->get('/types/{id}', ['uses' => 'ItemTypeController@types']);
});

/** Routes with auth */
$router->group(['namespace' => API_VERSION, 'prefix' => API_VERSION, 'middleware' => 'cors|jwt'], function () use ($router) {

    $router->group(['prefix' => 'user'], function () use ($router) {
        $router->get('/', ['uses' => 'UserController@get']);
        $router->post('/', ['uses' => 'UserController@updateAvatar']);
        $router->patch('/', ['uses' => 'UserController@update']);
    });

    //admin
    $router->group(['prefix' => 'admin', 'middleware' => 'admin'], function () use ($router) {
        $router->get('/users', ['uses' => 'AdminController@getUsers']);
        $router->group(['prefix' => 'user'], function () use ($router) {
            $router->post('/', ['uses' => 'AdminController@createUser']);
            $router->patch('/{id}', ['uses' => 'AdminController@updateUser']);
            $router->delete('/{id}', ['uses' => 'AdminController@deleteUser']);
        });
    });

    //items
    $router->group(['prefix' => 'item'], function () use ($router) {
        $router->get('/', ['uses' => 'ItemController@get']);
        $router->post('/', ['uses' => 'ItemController@create']);
        $router->patch('/{id}', ['uses' => 'ItemController@update']);
        $router->delete('/{id}', ['uses' => 'ItemController@delete']);
    });

    $router->group(['prefix' => 'favorites'], function () use ($router) {
        $router->get('/', ['uses' => 'FavoriteController@get']);
        $router->post('/', ['uses' => 'FavoriteController@add']);
        $router->delete('/{id}', ['uses' => 'FavoriteController@remove']);
    });
});