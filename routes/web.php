<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//<!-- Laravel Routes -->
Route::get('/','App\Http\Controllers\Users@_users')->name('loginUsers');


Route::group([
    'prefix' => config('user.prefix'),
    'as' => 'user.',
    'namespace' => 'App\\Http\\Controllers',
    ], function() { Route::middleware(['auth'])->group(
    function () {
    Route::post('/home','Users@_store')->name('userBookRoom');
    Route::get('/logout', 'Users@_logout')->name('logout');

    });
});

Route::group(
[
    'prefix' => config('admin.prefix'),
    'as' => 'admin.',
    'namespace' => 'App\\Http\\Controllers',
],function(){ Route::middleware(['auth'])->group(
    function () {
        Route::get('/logout', 'Users@_logout')->name('logout');

        Route::get('/dashboard', 'Admin@_show')->name('dashboard');

        Route::get('/exportdata', function () {
        return Excel::download(new RoombookExport, 'roombook.xlsx');
        })->name('exportdata');

        Route::get('/roombook', 'Roombook@_show')->name('roombook');

        Route::post('/roombook/add', 'Roombook@_store')->name('roombookAdd');

        Route::post('/roombook/delete', 'Roombook@_delete')->name('roombookDelete');

        Route::post('/roombook/confirm', 'Roombook@_confirm')->name('roombookConfirm');

        Route::get('/roombook/edit', 'Roombook@_show')->name('roombookEdit');

        Route::post('/roombook/edit', 'RoombookEdit@_update')->name('roombookEditUpdate');

        Route::get('/payment', 'Payment@_show')->name('payment');

        Route::post('/payment', 'Payment@_store')->name('paymentAdd');

        Route::get('/invoice', 'Payment@_migrate')->name('invoice');

        Route::get('/room', 'Room@_room')->name('room');

        Route::post('/room/add', 'Room@_store')->name('roomAdd');

        Route::post('/room/delete', 'Room@_delete')->name('roomDelete');

        Route::get('/staff', 'Staff@_staff')->name('staff');

        Route::post('/staff/add', 'Staff@_store')->name('staffAdd');

        Route::post('/staff/delete', 'Staff@_delete')->name('staffDelete');
    });
    });


//<!-- Vue-router Routes -->
// \App\Http\Middleware\ServeVueAssets::class,

    Route::get('/{any}', function ($uri) {
    $filePath = public_path('build/assets' . $uri);

    if (File::exists($filePath)) {
        return redirect(RouteServiceProvider::HOME);
    }

    // Handle the case when the file doesn't exist
    abort(404);
})->where('any', '.*');

