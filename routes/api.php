<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminApiController;
use App\Http\Controllers\Api\CustomerSlideApiController;
use App\Http\Controllers\Api\JobCityApiController;
use App\Http\Controllers\Api\JobAppApiController;
use App\Http\Controllers\Api\DeliveryApiController;
use App\Http\Controllers\Api\ClientsApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\API\JobsApiController;
use App\Http\Controllers\API\PaymentApiController;
use App\Http\Controllers\Api\ReportApiController;
use App\Http\Controllers\Api\ServicesApiController;
use App\Http\Controllers\Api\SettingApiController;
use App\Http\Controllers\Api\SlideApiController;
use App\Http\Controllers\Api\SocialApiController;
use App\Http\Controllers\Api\TasksApiController;
use App\Http\Controllers\Api\UsersApiController;

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




Route::get('/admin/dashboard', [AdminApiController::class, 'getDashboardData']);

Route::apiResource('job-cities', JobCityApiController::class);

Route::apiResource('job-applications', JobAppApiController::class)->only(['index', 'show', 'destroy']);

Route::apiResource('customer-slides', CustomerSlideApiController::class);

Route::apiResource('clients', ClientsApiController::class);

Route::get('clients/{client}/edit-options', [ClientsApiController::class, 'editOptions']);

Route::apiResource('deliveries', DeliveryApiController::class);

Route::apiResource('categories', CategoryApiController::class);

Route::apiResource('payments', PaymentApiController::class);

Route::apiResource('Jobs', JobsApiController::class);

Route::apiResource('Users', UsersApiController::class);

Route::apiResource('Tasks', TasksApiController::class);

Route::apiResource('Social', SocialApiController::class);

Route::apiResource('Slide', SlideApiController::class);

Route::apiResource('Setting', SettingApiController::class);

Route::apiResource('Services', ServicesApiController::class);

Route::apiResource('Report', ReportApiController::class);

Route::apiResource('ReportA', ReportApiController::class);
