<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustmerSlideController;
use App\Http\Controllers\NumbersController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\JobAppController;
use App\Http\Controllers\JobCityController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LogsController;


use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\mainSite;
use App\Http\Controllers\NotifySalesController;
use App\Http\Controllers\NotifyTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesTypeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TasksNotifyController;

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
Route::get('createAllPerm/', [UsersController::class, 'createAllPerm'])->name('admin.createAllPerm');
Route::get('addtpermre/', [UsersController::class, 'addtpermre'])->name('admin.addtpermre');

/* Route::get('/admin2', function ()
{
   return view('dash.index');
}); */

Route::get('/',[mainSite::class, 'index']);
Route::get('/category',[mainSite::class, 'category']);
Route::get('/services/{id}',[mainSite::class, 'services']);
Route::get('/order/{id}',[mainSite::class, 'order']);
Route::post('/SaveOrder/{id}',[mainSite::class, 'SaveOrder']);
Route::get('/jobs',[mainSite::class, 'job']);

Route::get('/contact',[mainSite::class, 'contact']);
Route::post('/SendContact',[mainSite::class, 'SendContact']);

Route::get('/CheckStatus',[mainSite::class, 'CheckStatus']);
Route::post('/CheckOrderStatus',[mainSite::class, 'CheckOrderStatus']);



Route::post('/SaveJobs',[mainSite::class, 'SaveJobs']);


Route::get('/test', function () {
    $ratingCode = (object) array('token' => '0');

    return view('test',[
        'img' => "banana.png",
        'status' => 0,
        'bill' => 1,
        'ratingCode' => $ratingCode
    
]);
});




Route::get('login/', [UsersController::class, 'loginView'])->name('login');

Route::get('logout/', [UsersController::class, 'logout'])->name('admin.logout');

Route::post('login/', [UsersController::class, 'login'])->name('admin.login');



Route::group(['as' => 'admin.', 'middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('dash.index');
        //        return redirect('admin/MainTask');

    });

    Route::group(['middleware' => ['permission:Search']], function () {

    Route::post('search',[SearchController::class,'search']);
    Route::get('Search', function () {
        return view('admin.search.index');
        //        return redirect('admin/MainTask');

    });
});
    

    Route::group(['middleware' => ['permission:Task']], function () {

        Route::get('MainTask', [TasksController::class, 'MainTask'])->name('admin.MainTask');
        Route::get('ShowTask/{id}', [TasksController::class, 'ShowTask'])->name('admin.ShowTask');
        Route::post('EditTask/{id}', [TasksController::class, 'EditTask'])->name('admin.EditTask');


        Route::get('showMyNotifyTask/{type}', [TasksController::class,'showMyNotifyTask']);
        Route::get('editMyNotifyTask/{type}', [TasksController::class,'editMyNotifyTask']);
        Route::post('postMyNotifyTask/{id}', [TasksController::class,'postMyNotifyTask']);


        Route::get('showmysale/{type}', [TasksController::class,'showmysale']);
        Route::get('editmysale/{type}', [TasksController::class,'editmysale']);
        Route::post('postmysale/{id}', [TasksController::class,'postmysale']);




    });

    Route::group(['middleware' => ['permission:TaskMangment']], function () {

        Route::resource('Task', TasksController::class);
        
        Route::resource('NotifySales', NotifySalesController::class);
        
        Route::resource('SalesType', SalesTypeController::class);

        Route::resource('TasksNotify', TasksNotifyController::class);












        
        Route::resource('NotifyType', NotifyTypeController::class);
        
        Route::get('MenuTask', [TasksController::class,'MenuTask'])->name('admin.MenuTask');

    });


    Route::group(['middleware' => ['permission:Massages']], function () {

        Route::resource('Messages', MessageController::class);

        Route::get('inbox/{type}', [MessageController::class, 'inbox'])->name('admin.inbox');

        Route::get('AllMessages/', [MessageController::class, 'main'])->name('admin.AllMessages');
    });


    Route::group(['middleware' => ['permission:Setting']], function () {

        Route::resource('Setting', SettingController::class);

        Route::resource('CustmerSlide', CustmerSlideController::class);
        
        Route::resource('Slide', SlideController::class);

        Route::resource('Contact', ContactController::class);

        Route::resource('Number', NumbersController::class);

        Route::resource('Social', SocialController::class);

        Route::get('basic/', [SettingController::class, 'setting'])->name('admin.basic');
    });

    Route::group(['middleware' => ['permission:Logs']], function () {

        Route::resource('Logs', LogsController::class);

        Route::get('LogsList/{id}', [LogsController::class, 'LogsList'])->name('admin.LogsList');

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

        Route::get('main/', [JobsController::class, 'main'])->name('admin.main');
    });

    Route::group(['middleware' => ['permission:Reviews']], function () {

        Route::resource('Clients', ClientsController::class);
    });


    Route::group(['middleware' => ['permission:Order']], function () {

        Route::get('showOrderList/{type}', [OrderController::class, 'showOrderList'])->name('admin.showOrderList');

        Route::resource('Order', OrderController::class);

        Route::get('Billprint/{id}', [ReportController::class, 'Billprint'])->name('Report.Billprint');

        Route::get('BillInnerPrint/{id}', [ReportController::class, 'BillInnerPrint'])->name('Report.BillInnerPrint');

        Route::get('seedAllOrderList/', [OrderController::class, 'seedAllOrderList'])->name('admin.seedAllOrderList');
    });


    Route::group(['middleware' => ['permission:Users']], function () {

        Route::resource('Users', UsersController::class);

        Route::delete('rmrole/{id}', [UsersController::class, 'rmrole'])->name('admin.rmrole');

        Route::post('addrole/', [UsersController::class, 'addrole'])->name('admin.addrole');

        Route::get('indexrole/', [UsersController::class, 'indexrole'])->name('admin.indexrole');

        Route::get('perm/', [UsersController::class, 'Perm'])->name('admin.perm');

        Route::post('addPerm/', [UsersController::class, 'addPerm'])->name('admin.addPerm');

        Route::get('UsersList/', [UsersController::class, 'UsersList'])->name('admin.UsersList');

        Route::get('addpermison/', [UsersController::class, 'addpermison'])->name('admin.addpermison');

        //Route::get('createAllPerm/', [UsersController::class, 'createAllPerm'])->name('admin.createAllPerm');

        Route::post('createUser/', [UsersController::class, 'createUser'])->name('admin.createUser');
    });




    Route::group(['middleware' => ['permission:Report']], function () {

        Route::get('showPdfReport/', [ReportController::class, 'showPdfReport'])->name('Report.showPdfReport');

        Route::get('Reportmain/', [ReportController::class, 'main'])->name('Report.main');

        Route::resource('Report', ReportController::class);

        Route::get('orderReport/', [ReportController::class, 'orderReport'])->name('Report.orderReport');

        Route::get('billReportView/', [ReportController::class, 'billReportView'])->name('Report.billReportView');
        Route::get('billReport/', [ReportController::class, 'billReport'])->name('Report.billReport');

        Route::get('cashReport/', [ReportController::class, 'cashReport'])->name('Report.cashReport');


       // printCreateBill

        
        Route::post('postCreateBill/', [ReportController::class, 'postCreateBill'])->name('Report.postCreateBill');
        Route::get('createBill/', [ReportController::class, 'createBill'])->name('Report.createBill');


        
    });
});
