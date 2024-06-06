<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Room\RoomTypeController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Employee\EmployeeController;

// Public routes
Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';

Route::post('register', [AdminController::class, 'store'])->name('admin.register');

Route::post('register/employee', [EmployeeController::class, 'store'])->name('employee.register');

Route::get('/employee/register', [EmployeeController::class, 'create'])->name('employee.create');

// Admin routes (admin middleware)
Route::middleware(['admin'])->group(function () {
 
    Route::post('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

});

// Employee routes (employee middleware)
Route::middleware(['employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'EmployeeDashboard'])->name('employee.index');
    Route::get('/employee/rooms', [EmployeeController::class, 'roomsView'])->name('room.employee.view');
    Route::post('employee/logout', [EmployeeController::class, 'destroy'])->name('employee.logout');

});


Route::middleware('auth:admin,employee')->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.index');


    Route::resource('roomtype', RoomTypeController::class);
    
    Route::resource('room', RoomController::class);

    Route::post('/bookings/{booking}/update', [BookingController::class, 'update'])->name('admin.bookings.update');
    Route::get('/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::post('/rooms/{id}/update-status', [RoomController::class, 'updateStatus'])->name('room.update-status');

});
