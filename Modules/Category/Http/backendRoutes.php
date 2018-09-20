<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/category'], function (Router $router) {
    $router->bind('category', function ($id) {
        return app('Modules\Category\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.category.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:category.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.category.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:category.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.category.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:category.categories.create'
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.category.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:category.categories.edit'
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.category.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:category.categories.edit'
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.category.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:category.categories.destroy'
    ]);
    $router->bind('users', function ($id) {
        return app('Modules\Category\Repositories\UsersRepository')->find($id);
    });
    $router->get('users', [
        'as' => 'admin.category.users.index',
        'uses' => 'UsersController@index',
        'middleware' => 'can:category.users.index'
    ]);
    $router->get('users/create', [
        'as' => 'admin.category.users.create',
        'uses' => 'UsersController@create',
        'middleware' => 'can:category.users.create'
    ]);
    $router->post('users', [
        'as' => 'admin.category.users.store',
        'uses' => 'UsersController@store',
        'middleware' => 'can:category.users.create'
    ]);
    $router->get('users/{users}/edit', [
        'as' => 'admin.category.users.edit',
        'uses' => 'UsersController@edit',
        'middleware' => 'can:category.users.edit'
    ]);
    $router->put('users/{users}', [
        'as' => 'admin.category.users.update',
        'uses' => 'UsersController@update',
        'middleware' => 'can:category.users.edit'
    ]);
    $router->delete('users/{users}', [
        'as' => 'admin.category.users.destroy',
        'uses' => 'UsersController@destroy',
        'middleware' => 'can:category.users.destroy'
    ]);
// append


});
