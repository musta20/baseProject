<?php

use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ClientsApiController;
use App\Http\Controllers\Api\CustomerSlideApiController;
use App\Http\Controllers\Api\DeliveryApiController;
use App\Http\Controllers\Api\JobAppApiController;
use App\Http\Controllers\Api\JobCityApiController;
use App\Http\Controllers\Api\JobsApiController;
use App\Http\Controllers\Api\MessageApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\PaymentApiController;
use App\Http\Controllers\Api\ReportApiController;
use App\Http\Controllers\Api\ServicesApiController;
use App\Http\Controllers\Api\SettingApiController;
use App\Http\Controllers\Api\SlideApiController;
use App\Http\Controllers\Api\SocialApiController;
use App\Http\Controllers\Api\TasksApiController;
use App\Http\Controllers\Api\UsersApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//missing routes  message - order

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('admin/login', [UsersApiController::class, 'login']);

Route::group(['as' => 'api.admin.', 'middleware' => ['auth:sanctum'], 'prefix' => 'admin'], function () {

    Route::get('admin/dashboard', [AdminApiController::class, 'getDashboardData']);

    Route::group(['middleware' => ['permission:Messages']], function () {
        Route::get('inbox/{type}', [MessageApiController::class, 'inbox'])->name('inbox');

        Route::apiResource('Messages', MessageApiController::class);

    });

    Route::group(['middleware' => ['permission:Order']], function () {

        Route::apiResource('Order', OrderApiController::class);

    });

    Route::group(['middleware' => ['permission:Category/Services']], function () {

        Route::apiResource('job-cities', JobCityApiController::class);

        Route::apiResource('Services', ServicesApiController::class);

        Route::apiResource('job-applications', JobAppApiController::class)->only(['index', 'show', 'destroy']);

        Route::apiResource('deliveries', DeliveryApiController::class);

        Route::apiResource('categories', CategoryApiController::class);

        Route::apiResource('payments', PaymentApiController::class);
    });

    Route::group(['middleware' => ['permission:jobs']], function () {

        Route::apiResource('Jobs', JobsApiController::class);
    });

    Route::group(['middleware' => ['permission:Reviews']], function () {

        Route::apiResource('clients', ClientsApiController::class);

        Route::get('clients/{client}/edit-options', [ClientsApiController::class, 'editOptions']);
    });

    Route::group(['middleware' => ['permission:Users']], function () {

        Route::apiResource('Users', UsersApiController::class);
    });

    Route::group(['middleware' => ['permission:Task']], function () {

        Route::apiResource('Tasks', TasksApiController::class);
    });

    Route::group(['middleware' => ['permission:Setting']], function () {

        Route::apiResource('customer-slides', CustomerSlideApiController::class);

        Route::apiResource('Social', SocialApiController::class);

        Route::apiResource('Slide', SlideApiController::class);

        Route::apiResource('Setting', SettingApiController::class);
    });

    Route::group(['middleware' => ['permission:Report']], function () {

        Route::apiResource('Report', ReportApiController::class);

        Route::apiResource('ReportA', ReportApiController::class);
    });
});
