<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StarController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Routes EMPLOYEES */
    Route::prefix('nos-stars')
        ->group(function () {
            Route::get('manage', [StarController::class, 'show'])
                ->name('show-stars');
            Route::get('add', [StarController::class, 'add'])
                ->name('add-star');
            Route::post('add', [StarController::class, 'create'])
                ->name('added-star');
            Route::get('edit/{id}', [StarController::class, 'edit'])
                ->name('edit-star');
            Route::put('update/{id}', [StarController::class, 'update']);
            Route::delete('delete/{id}', [StarController::class, 'destroy'])
                ->name('delete-star');
        });
});

require __DIR__.'/auth.php';
