<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\MyBookingListController;
use App\Http\Controllers\User\RoomListController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingListController;

use App\Http\Controllers\ChangePassController;

Route::get('/', function(){
    if(Auth::check() && Auth::user()->role == "ADMIN"){
        return redirect('/admin');
    }else if(Auth::check() && Auth::user()->role == "USER"){
        return redirect('/user');
    }
    return view ('dashboard');
});

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::prefix('user')->middleware(['auth', 'user'])->group(function(){
    Route::get('/', [UserDashboardController::class, 'index'])
    ->name('user.dashboard');
    Route::get('/dashboard-booking-list', [UserDashboardController::class, 'dashboard_booking_list'])
    ->name('dashboard.booking-list');
    Route::get('/room/json', [RoomListController::class, 'json'])
    ->name('room-list.json');
    Route::get('/room', [RoomListController::class, 'index'])
    ->name('room-list.index');

    Route::get('/my-booking-list/json', [MyBookingListController::class, 'json'])
    ->name('my-booking-list.json');
    Route::get('/my-booking-list', [MyBookingListController::class, 'index'])
    ->name('my-booking-list.index');
    Route::get('/my-booking-list/create', [MyBookingListController::class, 'create'])
    ->name('my-booking-list.create');
    Route::post('/my-booking-list/store', [MyBookingListController::class, 'store'])
    ->name('my-booking-list.store');
    Route::put('/my-booking-list/{id}/cancel', [MyBookingListController::class, 'cancel'])
    ->name('my-booking-list.cancel');
    });

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');

    Route::get('/user/json', [UserController::class, 'json'])
    ->name('user.json');

    Route::get('/user/{id}/change-pass', [UserController::class, 'change_pass'])
    ->name('user.change-pass');

    Route::put('/user/{id}/update-pass', [UserController::class, 'update_pass'])
    ->name('user.update-pass');

    Route::get('/room/json', [RoomController::class, 'json'])
    ->name('room.json');

    Route::get('/booking-list/json', [BookingListController::class, 'json'])
    ->name('booking-list.json');

    Route::get('/booking-list', [BookingListController::class, 'index'])
    ->name('booking-list.index');

    Route::put('/booking-list/{id}/update/{value}', [BookingListController::class, 'update'])
    ->name('booking-list.update');

    Route::resources([
        'user' => UserController::class,
        'room' => RoomController::class,
    ]);
});

$users = [
    'user', 'admin',
];

foreach ($users as $user) {
    Route::prefix($user)
    ->middleware(['auth'])
    ->group(function () use ($user) {
        if($user == 'user') $user = 'user';
        Route::get('/change-pass', [ChangePassController::class, 'index'])
        ->name($user.'.change-pass.index');
        Route::put('/change-pass/update', [ChangePassController::class, 'update'])
        ->name($user.'.change-pass.update');
    });
}