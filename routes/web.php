<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

// Importation des contrôleurs (Nécessaire pour Laravel 12)
use App\Http\Controllers\Users;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Roombook;
use App\Http\Controllers\RoombookEdit;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Room;
use App\Http\Controllers\Staff;
use App\Exports\RoombookExport; // Assurez-vous que cet export existe

// API Routes
Route::prefix('api')->group(function () {
    
    // Auth Routes
    Route::post('/login', [Users::class, '_users']);
    Route::post('/logout', [Users::class, '_logout']);

    // Protected Routes
    Route::middleware(['auth:sanctum'])->group(function () {
        
        // User Routes
        Route::prefix('user')->group(function () {
            Route::post('/book-room', [Users::class, '_store']);
        });

        // Admin Routes
        Route::prefix('admin')->middleware(['admin'])->group(function () {
            Route::get('/dashboard', [Admin::class, '_show']);
            Route::get('/export', function () {
                return Excel::download(new RoombookExport, 'roombook.xlsx');
            });

            // Roombook Routes
            Route::prefix('roombook')->group(function () {
                Route::get('/', [Roombook::class, '_show']);
                Route::post('/add', [Roombook::class, '_store']);
                Route::post('/delete', [Roombook::class, '_delete']);
                Route::post('/confirm', [Roombook::class, '_confirm']);
                Route::get('/edit', [Roombook::class, '_show']);
                Route::post('/edit', [RoombookEdit::class, '_update']);
            });

            // Payment Routes
            Route::prefix('payment')->group(function () {
                Route::get('/', [Payment::class, '_show']);
                Route::post('/', [Payment::class, '_store']);
                Route::get('/invoice', [Payment::class, '_migrate']);
            });

            // Room Routes
            Route::prefix('room')->group(function () {
                Route::get('/', [Room::class, '_room']);
                Route::post('/add', [Room::class, '_store']);
                Route::post('/delete', [Room::class, '_delete']);
            });

            // Staff Routes
            Route::prefix('staff')->group(function () {
                Route::get('/', [Staff::class, '_staff']);
                Route::post('/add', [Staff::class, '_store']);
                Route::post('/delete', [Staff::class, '_delete']);
            });
        });
    });
});

Route::get('/{any}', function () {
    return view('application');
})->where('any', '.*');
