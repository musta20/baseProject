<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CustmerSlideController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\JobAppController;
use App\Http\Controllers\JobCityController;
use App\Http\Controllers\JobsController;
//use App\Http\Controllers\ContactController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\Mainsite;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotifyTypeController;
use App\Http\Controllers\NumbersController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TasksNotifyController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Artisan;
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
// Route::get('addtpermre/', [UsersController::class, 'addtpermre'])->name('admin.addtpermre');

// Route::get('testlocal', function () {

//     Artisan::call('storage:link');

//     return 'linked';
// });

/* Route::get('/admin2', function ()
{
   return view('dash.index');
}); */

Route::get('/', [Mainsite::class, 'index']);
Route::get('category', [Mainsite::class, 'category'])->name('category');
Route::get('services/{category}', [Mainsite::class, 'services'])->name('services');
Route::get('order/{services}', [Mainsite::class, 'order'])->name('order');
Route::post('saveOrder/{services}', [Mainsite::class, 'saveOrder'])->name('saveOrder');
Route::get('jobs', [Mainsite::class, 'job'])->name('jobs');

Route::get('about', [Mainsite::class, 'about'])->name('about');
Route::get('term', [Mainsite::class, 'term'])->name('term');

Route::get('contact', [Mainsite::class, 'contact'])->name('contact');
Route::post('sendContact', [Mainsite::class, 'sendContact'])->name('sendContact');

Route::get('checkStatus', [Mainsite::class, 'checkStatus'])->name('checkStatus');
Route::post('checkOrderStatus', [Mainsite::class, 'checkOrderStatus'])->name('checkOrderStatus');

Route::post('saveJobs', [Mainsite::class, 'saveJobs'])->name('saveJobs');

Route::get('test', function () {
    $ratingCode = (object) ['token' => '0'];

    return view('test', [
        'img' => 'banana.png',
        'status' => 0,
        'bill' => 1,
        'ratingCode' => $ratingCode,

    ]);
});

Route::get('login/', [UsersController::class, 'loginView'])->name('login');

Route::get('logout/', [UsersController::class, 'logout'])->name('admin.logout');

Route::post('login/', [UsersController::class, 'login'])->name('admin.login');

Route::group(['as' => 'admin.', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::group(['middleware' => ['permission:Search']], function () {

        Route::post('search', [SearchController::class, 'search'])->name('search');
        Route::get('Search', function () {
            return view('admin.search.index');
        });
    });

    Route::group(['middleware' => ['permission:Task']], function () {

        Route::get('mainTask', [TasksController::class, 'mainTask'])->name('admin.mainTask');
        Route::get('showTask/{task}', [TasksController::class, 'showTask'])->name('admin.showTask');
        Route::post('editTask/{task}', [TasksController::class, 'editTask'])->name('admin.editTask');

        Route::get('showMyNotifyTask/{type}', [TasksController::class, 'showMyNotifyTask'])->name('showMyNotifyTask');
        Route::get('editMyNotifyTask/{type}', [TasksController::class, 'editMyNotifyTask'])->name('editMyNotifyTask');
        Route::post('postMyNotifyTask/{id}', [TasksController::class, 'postMyNotifyTask'])->name('postMyNotifyTask');

        // Route::get('editmysale/{type}', [TasksController::class,'editmysale']);
        // Route::post('postmysale/{id}', [TasksController::class,'postmysale']);

    });

    Route::group(['middleware' => ['permission:TaskMangment']], function () {

        Route::resource('Task', TasksController::class);

        // Route::resource('NotifySales', NotifySalesController::class);

        //Route::resource('SalesType', SalesTypeController::class);

        Route::resource('TasksNotify', TasksNotifyController::class);

        Route::resource('NotifyType', NotifyTypeController::class);

        Route::get('menuTask', [TasksController::class, 'menuTask'])->name('admin.menuTask');

    });

    Route::group(['middleware' => ['permission:Massages']], function () {

        ///stoped here

        Route::resource('Messages', MessageController::class);

        Route::get('inbox/{type}', [MessageController::class, 'inbox'])->name('inbox');

        Route::get('AllMessages/', [MessageController::class, 'main'])->name('AllMessages');
    });

    Route::group(['middleware' => ['permission:Setting']], function () {

        Route::resource('Setting', SettingController::class);

        Route::resource('CustmerSlide', CustmerSlideController::class);

        Route::resource('Slide', SlideController::class);

        //Route::resource('Contact', ContactController::class);

        Route::resource('Number', NumbersController::class);

        Route::resource('Social', SocialController::class);

        Route::get('basic/', [SettingController::class, 'setting'])->name('basic');
    });

    Route::group(['middleware' => ['permission:Logs']], function () {

        Route::resource('Logs', LogsController::class);

        Route::get('logsList/{id}', [LogsController::class, 'logsList'])->name('logsList');

    });

    Route::group(['middleware' => ['permission:Category/Services']], function () {

        Route::resource('Category', CategoryController::class);

        Route::resource('Services', ServicesController::class);

        Route::resource('JobApp', JobAppController::class);

        Route::resource('JobCity', JobCityController::class);

        Route::resource('Delivery', DeliveryController::class);

        Route::resource('Payment', PaymentController::class);
    });

    Route::group(['middleware' => ['permission:jobs']], function () {

        Route::resource('Jobs', JobsController::class);

        Route::get('main/', [JobsController::class, 'main'])->name('main');
    });

    Route::group(['middleware' => ['permission:Reviews']], function () {

        Route::resource('Clients', ClientsController::class);
    });

    Route::group(['middleware' => ['permission:Order']], function () {

        Route::get('showOrderList/{type}', [OrderController::class, 'showOrderList'])->name('showOrderList');

        Route::resource('Order', OrderController::class);

        Route::get('billPrint/{id}', [ReportController::class, 'billPrint'])->name('billPrint');

        Route::get('billInnerPrint/{id}', [ReportController::class, 'billInnerPrint'])->name('billInnerPrint');

        // Route::get('seedAllOrderList/', [OrderController::class, 'seedAllOrderList'])->name('seedAllOrderList');
    });

    Route::group(['middleware' => ['permission:Users']], function () {

        Route::resource('Users', UsersController::class);

        Route::delete('removerole/{id}', [UsersController::class, 'rmrole'])->name('removerole');

        Route::post('addrole/', [UsersController::class, 'addrole'])->name('addrole');

        Route::get('indexrole/', [UsersController::class, 'indexrole'])->name('indexrole');

        Route::get('perm/', [UsersController::class, 'Perm'])->name('perm');

        Route::post('addPerm/', [UsersController::class, 'addPerm'])->name('addPerm');

        Route::get('usersList/', [UsersController::class, 'usersList'])->name('usersList');

        Route::post('createUser/', [UsersController::class, 'createUser'])->name('createUser');
    });

    Route::group(['middleware' => ['permission:Report']], function () {

        Route::get('showPdfReport/', [ReportController::class, 'showPdfReport'])->name('showPdfReport');

        Route::get('Reportmain/', [ReportController::class, 'main'])->name('main');

        Route::resource('Report', ReportController::class);

        Route::get('orderReport/', [ReportController::class, 'orderReport'])->name('orderReport');

        Route::get('billReportView/', [ReportController::class, 'billReportView'])->name('billReportView');

        Route::get('billReport/', [ReportController::class, 'billReport'])->name('billReport');

        Route::get('cashReport/', [ReportController::class, 'cashReport'])->name('cashReport');

        // printCreateBill

        Route::post('postCreateBill/', [ReportController::class, 'postCreateBill'])->name('Report.postCreateBill');
        Route::get('createBill/', [ReportController::class, 'createBill'])->name('createBill');

    });
});
