<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 9/21/2018
 * Time: 4:50 PM
 */
use Dingo\Api\Routing\Router;
$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function (Router $api) {
    $api->post("login","Modules\\ThanhUsers\\Http\\Controllers\\AuthController@authenticate");
    $api->group(['middleware'=>'jwt.auth'],function (Router $api){
        $api->post("check","Modules\\ThanhUsers\\Http\\Controllers\\AuthController@getAuthenticatedUser");
        $api->post("test","Modules\\ThanhUsers\\Http\\Controllers\\AuthController@testPost");
    });
});