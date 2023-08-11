<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Mitra\EventController;
use App\Http\Controllers\Mitra\BankController;
use App\Http\Controllers\Mitra\TicketController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\User\IndexController;
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


Route::get('/coba', function () {
    return view('pages.mitra.pages.withdraw.rpwithdraw');
});




// Dashboard After Login

Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');


// Defined Route for guest
Route::group(['prefix' => ''], function(){
    Route::get('/', [IndexController::class,"index"])->name('user.dashboard');
    Route::get('/details/{id}', [IndexController::class,"details"])->name('user.details');
    Route::get('/details', [IndexController::class,"detailAll"])->name('user.detailAll');
    Route::post('/details', [IndexController::class,"buyTicket"])->name('user.details.post');
});
// End Defined Route for guest

// Defined Route for User Previlege
Route::middleware(["auth","user"])->group(function(){
    // Route::get('/', [IndexController::class,"index"])->name('user.dashboard');
});
// End Defined Route for User Previlege


// Defined Route for Mitra Previlege
Route::middleware(['auth', 'mitra'])->group(function () {
    Route::get('/mitra/dashboard', function () {
        return view('pages.mitra.dashboard');
    })->name('mitra.dashboard');

    // Defining Route For CRUD Events
    Route::get('/mitra/events', [EventController::class, 'get'])->name('events.get');
    Route::post('/mitra/add/events', [EventController::class, 'post'])->name('events.post');
    Route::put('/mitra/{id}/events', [EventController::class, 'update'])->name('events.update');
    Route::delete('/mitra/{id}/events', [EventController::class, 'delete'])->name('events.delete');
    // End Defining Route For CRUD Events

    // Defining Route For CRUD Tickets
    Route::get('/mitra/tickets', [TicketController::class, 'get'])->name('ticket.get');
    Route::post('/mitra/tickets', [TicketController::class, 'post'])->name('ticket.post');
    Route::put('/mitra/tickets/{id}/update', [TicketController::class, 'update'])->name('ticket.update');
    Route::delete('/mitra/tickets/{id}/update', [TicketController::class, 'delete'])->name('ticket.delete');
    // End Defining Route For CRUD Tickets

    // Defining Route For Bank Account Mitra
    Route::get('/mitra/bank', [BankController::class, 'get'])->name('bank.get');
    Route::post('/mitra/bank/add', [BankController::class, 'post'])->name('bank.post');
    Route::put('/mitra/bank/{id}/update', [BankController::class, 'update'])->name('bank.update');
    Route::delete('/mitra/bank/{id}/delete', [BankController::class, 'delete'])->name('bank.delete');
    // End Defining Route For Bank Account Mitra

    // manage withdraw
    Route::get('withdraw', [MitraController::class, 'manageWithdraw'])->name('withdraw.get');
    // update withdraw
    Route::match(['get', 'post'], '/withdraw/add', [MitraController::class, 'addWithdraw'])->name('withdraw.add');
});
// End Defined Route for Mitra Previlege


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('/admin')->group(function () {
    // admin login
    Route::match(['get', 'post'], 'login', [AdminController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => ['admin']], function () {
        // Admin Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // logout
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        // manage mitra
        Route::get('/mitra', [AdminController::class, 'manageMitra'])->name('admin.manage.mitra');
        // tambah mitra
        Route::match(['get', 'post'], '/add/mitra', [AdminController::class, 'addMitra'])->name('admin.add.mitra');
        // edit mitra
        Route::match(
            ['get', 'post'],
            '/edit/mitra/{id}',
            [AdminController::class, 'updateMitra'
            ]
        )->name('admin.edit.mitra');
        // delete mitra
        Route::match(['get', 'post'], '/delete/mitra/{id}', [AdminController::class, 'deleteMitra'])->name('admin.delete.mitra');
        // manage admin
        Route::get('/admin', [AdminController::class, 'manageAdmin'])->name('admin.manage.admin');
        // tambah admin
        Route::match(['get', 'post'], '/add/admin', [AdminController::class, 'addAdmin'])->name('admin.add.admin');
        // edit admin
        Route::match(
            ['get', 'post'],
            '/edit/admin/{id}',
            [AdminController::class, 'updateAdmin'
            ]
        )->name('admin.edit.admin');
        // delete admin
        Route::match(['get', 'post'], '/delete/admin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete.admin');
        // admin manage event
        Route::get('event', [AdminController::class, 'manageEvent'])->name('admin.manage.event');
        // update event
        Route::match([
            'get', 'post', 'put'
        ], '/update/event/{event_id}', [AdminController::class, 'updateEvent'])->name('admin.update.event');
        // delete event
        Route::match(['get', 'post'],
            '/delete/event/{event_id}',
            [AdminController::class, 'deleteEvent']
        )->name('admin.delete.event');
        // admin manage ticket
        Route::get('ticket', [AdminController::class, 'manageTicket'])->name('admin.manage.ticket');
        // update ticket
        Route::match([
            'get', 'post', 'put'
        ], '/update/ticket/{ticket_id}', [AdminController::class, 'updateTicket'])->name('admin.update.ticket');
        // delete ticket
        Route::match(['get', 'post'],
            '/delete/ticket/{ticket_id}',
            [AdminController::class, 'deleteTicket']
        )->name('admin.delete.ticket');
        // admin manage discount
        Route::get('discount', [AdminController::class, 'manageDiscount'])->name('admin.discount');
        // admin tambah discount
        Route::match(
            ['get', 'post'],
            '/add/discount',
            [AdminController::class, 'addDiscount'
            ]
        )->name('admin.add.discount');
        // admin manage user
        Route::get('user', [AdminController::class, 'manageUser'])->name('admin.manage.user');
        // edit user
        Route::match(['get', 'post'],
            '/edit/user/{id}',
            [AdminController::class, 'updateUser']
        )->name('admin.edit.user');
        // delete user
        Route::match(
            ['get', 'post'],
            '/delete/user/{id}',
            [AdminController::class, 'deleteUser'
            ]
        )->name('admin.delete.user');
        // admin manage withdraw
        Route::get('withdraw', [AdminController::class, 'manageWithdraw'])->name('admin.manage.withdraw');
        // update withdraw
        Route::match([
            'get', 'post', 'put'
        ], '/update/withdraw/{withdraw_id}', [AdminController::class, 'updateWithdraw'])->name('admin.update.withdraw');
        // admin manage reports
        Route::get('report-event', [AdminController::class, 'reportEvent'])->name('admin.report.event');
        Route::get('report-user', [AdminController::class, 'reportUser'])->name('admin.report.user');
        Route::get('report-mitra', [AdminController::class, 'reportMitra'])->name('admin.report.mitra');
        Route::get(
            'report-ticket',
            [AdminController::class, 'reportTicket'
            ]
        )->name('admin.report.ticket');
        Route::get('report-withdraw',
            [AdminController::class, 'reportWithdraw']
        )->name('admin.report.withdraw');
        // admin manage transaksi
        Route::get('transaksi', [AdminController::class, 'reportTransaksi'])->name('admin.manage.transaksi');
        // manage banner
        Route::get('banner', [AdminController::class, 'manageBanner'])->name('admin.manage.banner');
        // add banner
        Route::match(['get', 'post'], '/add/banner', [AdminController::class, 'addBanner'])->name('admin.add.banner');
        // update banner
        Route::match(['get', 'post', 'put'], '/update/banner/{banner_id}', [AdminController::class, 'updateBanner'])->name('admin.update.banner');
        // delete banner
        Route::match(['get', 'post'], '/delete/banner/{banner_id}', [AdminController::class, 'deleteBanner'])->name('admin.delete.banner');
    });
});