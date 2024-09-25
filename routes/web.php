<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/customer/dashboard', function () {
    return view('customer-dashboard');
})->middleware(['auth', 'customer', 'verified'])->name('customer.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin-dashboard');
})->middleware(['auth', 'admin', 'verified'])->name('admin.dashboard');

Route::get('/user/add', function () {
    return view('add-user');
})->middleware(['auth', 'admin', 'verified'])->name('add.user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
