<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'uses' => 'HomeController@index'])->name('home');
Route::get('/about', [HomeController::class, 'uses' => 'HomeController@about'])->name('about');
Route::get('/search', [CompanyController::class, 'uses' => 'CompanyController@search'])->name('search');
Route::get('/contact', [HomeController::class, 'uses' => 'HomeController@contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'uses' => 'HomeController@contact'])->name('contact');
Route::get('/rules', [HomeController::class, 'uses' => 'HomeController@rules'])->name('rules');
Route::get('/company/{id}', [CompanyController::class, 'uses' => 'CompanyController@show'])->name('show');