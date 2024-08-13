<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelpDeskController;
use App\Http\Controllers\EmergencyReportController;
use App\Http\Controllers\IncidentResponseController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PracticeController;









Route::group(['middleware' => 'auth'], function () {
   

// Route to display the ticket submission form
Route::get('/create-ticket', [HelpDeskController::class, 'index'])->name('create_ticket_form');

// Route to handle the submission of the ticket form
Route::post('/submit-ticket', [HelpDeskController::class, 'submitTicket'])->name('submit_ticket');

    Route::get('/', [DashboardController::class, 'index'])->name('/');
    Route::view('index', 'index')->name('index');

    Route::get('/helpdesk', [HelpDeskController::class, 'index'])->name('helpdesk.index');
    
    Route::get('/emergencyreport', [EmergencyReportController::class, 'index'])->name('emergencyreport.index');
    Route::get('/emergencyreport/show', [EmergencyReportController::class, 'show'])->name('emergencyreport.show');

    Route::post('/incidentsresponse/store', [IncidentResponseController::class, 'store'])->name('incidentsresponse.store');


    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('dashboard/show', [DashboardController::class, 'show'])->name('dashboard.show');

    Route::get('/fullcalendar', [EventController::class, 'fullCalendar']);
    Route::get('/fullcalendar', [EventController::class, 'getEvents']);


    Route::get('items/create', [ItemController::class, 'create']);

    Route::post('items/show', [ItemController::class, 'show'])->name('items.show');

Route::get('admin/dashboard', function () {
    // Only users with 'admin' role can access this route
})->middleware('role:admin');


    Route::resource('events', EventController::class);
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::post('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/update', [EventController::class, 'update'])->name('events.update');
    Route::post('/events/delete', [EventController::class, 'delete'])->name('events.delete');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
 });

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/portfolio/react', [PortfolioController::class, 'react'])->name('portfolio.react');


Route::get('/practice', [PracticeController::class, 'index'])->name('practice.index');

Route::resource('/home', PostController::class);
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

