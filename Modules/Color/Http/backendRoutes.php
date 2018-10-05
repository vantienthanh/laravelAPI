<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/color'], function (Router $router) {
    $router->bind('color', function ($id) {
        return app('Modules\Color\Repositories\ColorRepository')->find($id);
    });
    $router->get('colors', [
        'as' => 'admin.color.color.index',
        'uses' => 'ColorController@index',
        'middleware' => 'can:color.colors.index'
    ]);
    $router->get('colors/create', [
        'as' => 'admin.color.color.create',
        'uses' => 'ColorController@create',
        'middleware' => 'can:color.colors.create'
    ]);
    $router->post('colors', [
        'as' => 'admin.color.color.store',
        'uses' => 'ColorController@store',
        'middleware' => 'can:color.colors.create'
    ]);
    $router->get('colors/{color}/edit', [
        'as' => 'admin.color.color.edit',
        'uses' => 'ColorController@edit',
        'middleware' => 'can:color.colors.edit'
    ]);
    $router->put('colors/{color}', [
        'as' => 'admin.color.color.update',
        'uses' => 'ColorController@update',
        'middleware' => 'can:color.colors.edit'
    ]);
    $router->delete('colors/{color}', [
        'as' => 'admin.color.color.destroy',
        'uses' => 'ColorController@destroy',
        'middleware' => 'can:color.colors.destroy'
    ]);
// append

});
