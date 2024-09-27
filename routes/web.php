<?php

use App\Http\Controllers\Customer\SupportTicketController;
use App\Http\Controllers\Admin\SupportTicketController as AdminSupportTicketController;
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

Route::middleware(['auth', 'customer', 'verified'])->group(function () {
    Route::prefix('customer')->group(function () {
        Route::get('/dashboard', [SupportTicketController::class, 'index'])->name('customer.dashboard');
        Route::get('/add-support-ticket', [SupportTicketController::class, 'create'])->name('customer.add.support.ticket');
        Route::post('/store-support-ticket', [SupportTicketController::class, 'store'])->name('customer.store.support.ticket');
        Route::get('/show-support-ticket/{id}', [SupportTicketController::class, 'show'])->name('customer.show.support.ticket');
    });
});


Route::middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminSupportTicketController::class, 'index'])->name('admin.dashboard');
        Route::get('/show-support-ticket', [AdminSupportTicketController::class, 'show'])->name('admin.show.support.ticket');
        Route::get('/resolve-support-ticket', [AdminSupportTicketController::class, 'resolve'])->name('admin.resolve.support.ticket');
        Route::get('/delete-support-ticket', [AdminSupportTicketController::class, 'delete'])->name('admin.delete.support.ticket');
        Route::get('/user/add', function () {
            return view('add-user');
        })->name('add.user');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
