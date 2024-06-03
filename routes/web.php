<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Room\RoomTypeController;
use App\Http\Controllers\Employee\EmployeeController;


Route::get('/', function () {
      return view('frontend.index');
    });

    Route::get('/dashboard', function () {
        return view('frontend.dashboard.user_dashboard');
      })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('admin')->group(function () {

    Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.index');

    Route::resource('roomtype',RoomTypeController::class);
    
    Route::resource('room',RoomController::class);



});

Route::middleware('employee')->group(function () {

    Route::get('/employee/dashboard',[EmployeeController::class,'EmployeeDashboard'])->name('employee.index');



});
