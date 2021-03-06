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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'api/v1'], function() use($router){
    $router->get('/status', 'StatusController@index');

    $router->get('/church/{church_id}/people', 'PeopleController@index');
    $router->get('/church/{church_id}/people/{person_id}', 'PeopleController@show');

    $router->get('/church/{church_id}/groups', 'GroupController@index');
    $router->get('/church/{church_id}/groups/{group_id}', 'GroupController@show');
});
