<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NumbersController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\JobAppController;
use App\Http\Controllers\JobCityController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

    Route::resource('Setting', SettingController::class);

    Route::resource('Category', CategoryController::class);

    Route::resource('Jobs', JobsController::class);

    Route::resource('Services', ServicesController::class);

    Route::resource('Clients', ClientsController::class);

    Route::resource('Order', OrderController::class);

    Route::resource('Slide', SlideController::class);

    Route::resource('Contact', ContactController::class);

    Route::resource('Number', NumbersController::class);

    Route::resource('Social', SocialController::class);

    Route::resource('JobApp', JobAppController::class);

    Route::resource('JobCity', JobCityController::class);

    Route::get('basic/', 'App\Http\Controllers\SettingController@setting')->name('admin.basic');

    Route::get('main/', 'App\Http\Controllers\JobsController@main')->name('admin.main');

    Route::get('showOrderList/{type}', 'App\Http\Controllers\OrderController@showOrderList')->name('admin.showOrderList');



});
