<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\InvoiceItemsController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HtmlMinifier;

Route::middleware([HtmlMinifier::class])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        //
        // Route::get('admin-attendance', [AttendanceController::class, 'adminAttendance'])->name('admin.attendance-review');
        // Route::get('users', [AttendanceController::class, 'viewStudents'])->name('students.view');
        Route::resource('customers', CustomersController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('invoices', InvoicesController::class);
        Route::resource('invoices-item', InvoiceItemsController::class);
        Route::resource('payments', PaymentsController::class);
    });


    require __DIR__ . '/auth.php';
});
