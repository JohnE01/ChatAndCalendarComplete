<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;




Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::view('index', 'index')->name('index');

   

    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    Route::get('dashboard/show', [DashboardController::class,'show'])->name('dashboard.show');

    Route::get('/fullcalendar', [EventController::class, 'fullCalendar']);
    Route::get('/fullcalendar', [EventController::class, 'getEvents']);


Route::get('items/create', [ItemController::class, 'create']);

Route::post('items/show', [ItemController::class, 'show'])->name('items.show');

Route::resource('events', EventController::class);
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::post('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events/update', [EventController::class, 'update'])->name('events.update');
Route::post('/events/delete', [EventController::class, 'delete'])->name('events.delete');
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
});

    Route::get('/register',[AuthController::class,'register'])->name('register');
    Route::post('/register',[AuthController::class,'registerPost'])->name('register');
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'loginPost'])->name('login');


    Route::resource('/home',PostController::class);
    Route::delete('/logout',[AuthController::class,'logout'])->name('logout');

