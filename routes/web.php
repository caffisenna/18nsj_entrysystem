<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::middleware('auth')->group(function () {
    // 共通
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Route::get('/home', [
    //     HomeController::class, 'index'
    // ])->name('home');

    // 一般ユーザ用
    Route::prefix('user')->group(function () {
        // Route::get('/', 'User\HomeController@index');
        Route::resource('troopInfos', App\Http\Controllers\TroopInfoController::class);
        Route::resource('members', App\Http\Controllers\MemberController::class);
        Route::resource('volstaffs', App\Http\Controllers\VolstaffController::class);
        // Route::resource('planUploads', App\Http\Controllers\planUploadController::class, ['except' => ['edit', 'show', 'update']]);
        // Route::resource('temps', App\Http\Controllers\tempsController::class);
        // Route::get('/status_update', [
        //     App\Http\Controllers\statusController::class, 'status_update'
        // ])->name('status_update');
        // Route::resource('resultInputs', App\Http\Controllers\resultInputsController::class);
    });
    // 管理ユーザ用
    Route::prefix('admin')->middleware('can:admin')->group(function () {
        Route::resource('districtExecs', App\Http\Controllers\DistrictExecController::class);
        Route::resource('_trooplists', App\Http\Controllers\adminTroopInfoController::class,['only' => ['index']]);
        // Route::get('/', 'Admin\HomeController@index');
        // Route::resource('adminConfigs', App\Http\Controllers\AdminConfigController::class);
        // Route::resource('adminentries', App\Http\Controllers\adminentryFormController::class, ['except' => 'create']);
        // Route::get('/deleted', [App\Http\Controllers\adminentryFormController::class, 'deleted'])->name('deleted');
        // Route::resource('adminresultUploads', App\Http\Controllers\adminresultUploadController::class, ['except' => 'create']);
        // Route::get('/result_lists', [App\Http\Controllers\adminresultUploadController::class, 'lists'])->name('resultlists');
        // Route::get('/temp_lists', [App\Http\Controllers\tempsController::class, 'temp_list'])->name('templists');
        // Route::resource('reach50100', App\Http\Controllers\reach50100Controller::class);
        // Route::resource('adminplanUploads', App\Http\Controllers\adminplanUploadController::class, ['except' => ['create', 'edit', 'show', 'update']]);
    });
    // スタッフ用
    Route::prefix('staff')->middleware('can:staff')->group(function () {
        // Route::resource('staffplanUploads', App\Http\Controllers\staffplanUploadController::class, ['except' => ['create', 'edit', 'show', 'update']]);
    });
    // 地区コミ用
    Route::prefix('commi')->middleware('can:commi')->group(function () {
        // Route::resource('entries', App\Http\Controllers\commiEntryFormController::class, ['only' => ['index', 'show']]);
    });
});

