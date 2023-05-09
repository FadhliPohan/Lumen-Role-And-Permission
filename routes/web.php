<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HakAksesController;



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

//rout dengan auth
$router->group(['middleware' => ['auth']], function () use ($router) {
    Route::post('book', 'BookController@create');
    Route::get('book', 'BookController@index');
    Route::get('book/{id}', 'BookController@show');
    Route::put('book/{id}', 'BookController@update');
    Route::delete('book/{id}', 'BookController@destroy');
    $router->get('/', function () use ($router) {
        echo "<center> Welcome </center>";
    });

    $router->get('/version', function () use ($router) {
        return $router->app->version();
    });
});


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');

$router->group(['prefix' => 'role'], function () use ($router) {
    Route::get('/', 'RoleController@get');
    Route::get('/getById/{id}', 'RoleController@getById');
    Route::post('/store', 'RoleController@store');
    Route::patch('/update/{id}', 'RoleController@update');
    Route::delete('/delete/{id}', 'RoleController@delete');
});

$router->group(['prefix' => 'permissions'], function () use ($router) {
    Route::get('/', 'PermissionController@get');
    Route::get('/getById/{id}', 'PermissionController@getById');
    Route::post('/store', 'PermissionController@store');
    Route::delete('/delete/{id}', 'PermissionController@destroy');
    Route::get('/update/{id}', 'PermissionController@update');
});

$router->group(['prefix' => 'userroles'], function () use ($router) {
    Route::get('/', 'UserRoleController@index');
    Route::get('/edit/{id}', 'UserRoleController@edit');
    Route::patch('/update/{id}', 'UserRoleController@update');
});

