<?php

use Dingo\Api\Routing\Router;

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function (Router $a) {
    $a->get("/category/{id}", "Modules\Category\Http\Controllers\Api\CategoryController@show");
    $a->get("/category", "Modules\\Category\\Http\\Controllers\\Api\\CategoryController@index");
    $a->put("/category/{id}", "Modules\\Category\\Http\\Controllers\\Api\\CategoryController@update");
});