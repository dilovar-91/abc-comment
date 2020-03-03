<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('companies', CompanyController::class);
    $router->resource('reviews', ReviewController::class);
	
	
	    // api routes for admin panel

    $router->get('/api/cities', 'ApiController@cities')->name('admin.api.cities');
    $router->get('/api/metro', 'ApiController@metro')->name('admin.api.metro');
    $router->get('/api/companies', 'ApiController@company')->name('admin.api.companies');

});
