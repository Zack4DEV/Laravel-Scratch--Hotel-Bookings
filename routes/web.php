<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/','App\Http\Controllers\Authenticate@_signup')->name('userSignup');
Route::post('/','App\Http\Controllers\Authenticate@_user')->name('userLogin');
Route::post('/','App\Http\Controllers\Authenticate@_admin')->name('adminLogin');


Route::group([
    'prefix' => config('user.prefix'),
    'as' => 'user.',
    'namespace' => 'App\\Http\\Controllers',
    'middleware' => 'auth.failback'
    ], function() { Route::middleware(['auth.failback'])->group(
    function () {
    Route::get('/home','User@_show')->name('home');
    Route::post('/home','User@_store')->name('userBookRoom');
    Route::get('/logout', 'User@_logout')->name('userLogout');

    });
});

Route::group(
[
    'prefix' => config('admin.prefix'),
    'as' => 'admin.',
    'namespace' => 'App\\Http\\Controllers',
    'middleware' => 'auth.failback',
],function(){ Route::middleware(['auth.failback'])->group(
    function () {
        Route::get('/logout', 'Admin@_logout')->name('Adminlogout');

        Route::get('/dashboard', 'Admin@_show')->name('dashboard');

        Route::post('/exportdata', 'Admin@_migrate')->name('exportdata');

        Route::get('/roombook/list', 'Roombook@_show')->name('roombook');

        Route::post('/roombook/add', 'Roombook@_store')->name('roombookAdd');

        Route::post('/roombook/delete', 'Roombook@_delete')->name('roombookDelete');

        Route::post('/roombook/confirm', 'Roombook@_confirm')->name('roombookConfirm');

        Route::get('/roombook/edit', 'Roombook@_show')->name('roombookEdit');

        Route::post('/roombook/edit', 'RoombookEdit@_update')->name('roombookEditUpdate');

        Route::get('/payment/list', 'Payment@_show')->name('payment');

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
Route::get('{any?}', function() {
        return view('Application');
        })->where('any', '.*');
