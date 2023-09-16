<?php

use App\Http\Controllers\Admin\ContactController;
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

Route::get('/', [ContactController::class, 'list'])->name('contacts.list');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('contacts', ContactController::class);
});

Auth::routes(['register' => false]);

