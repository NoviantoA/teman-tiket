<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Mitra\BankController;
use App\Http\Controllers\Mitra\EventController;
use App\Http\Controllers\Mitra\TicketController;
<<<<<<< Updated upstream
=======
use App\Http\Controllers\MitraController;
use App\Http\Controllers\MitraDashboardController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\TicketTransactionController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\InvoiceController;
>>>>>>> Stashed changes
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\HistoryController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\User\SettingController;
use App\Http\Controllers\User\TicketTransactionController;
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
Route::middleware("guest")->group(function () {
    Route::get('/', [IndexController::class, "index"])->name('user.dashboard');
    Route::get('/details/{id}', [IndexController::class, "details"])->name('user.details');
    Route::get('/details', [IndexController::class, "detailAll"])->name('user.detailAll');
    Route::post('/details', [IndexController::class, "buyTicket"])->name('user.details.post');
});
// End Defined Route for guest

// Defined Route for User Previlege
Route::middleware(["auth", "user"])->group(function () {
    // Transactions
    Route::get('/transactions', [TicketTransactionController::class, "index"]);
    Route::post('/transactions', [TicketTransactionController::class, "checkoutHandler"])->name('user.checkoutHandler');
    Route::get('/transactions/payments', [TicketTransactionController::class, "indexPayment"])->name('user.payment');
    // End Transactions

    // Histories
    Route::get('/history', [HistoryController::class, "index"])->name("index.history");
    // End Histories

    // Invoice
    Route::get('/invoice/{id}', [InvoiceController::class, "index"])->name("index.invoice");
    // End Invoice

    // User Setting
    Route::get("/setting", [SettingController::class, "index"])->name("index.setting");
    Route::put("/setting/identification", [SettingController::class, "updateInfo"])->name("update.info.setting");
    Route::put("/setting/acc", [SettingController::class, "updateAcc"])->name("update.acc.setting");
    // End User Setting

});
// End Defined Route for User Previlege

// Defined Route for Mitra Previlege
Route::middleware(['auth', 'mitra'])->group(function () {
    Route::get('/mitra/dashboard', [MitraDashboardController::class, 'index'])->name('mitra.dashboard');

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

    // Defining Route for mitra settings
    Route::get("mitra/setting", [SettingController::class, "mitraIndex"])->name("mitra.index.setting");
    Route::put("mitra/setting/identification", [SettingController::class, "updateInfo"])->name("mitra.update.info.setting");
    Route::put("mitra/setting/acc", [SettingController::class, "updateAcc"])->name("mitra.update.acc.setting");
    // End Defining Route for mitra settings
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
    Route::match (['get', 'post'], 'login', [AdminController::class, 'login'])->name('admin.login');
    Route::group(['middleware' => ['admin']], function () {
        // Admin Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        // logout
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        // manage mitra
        Route::get('/mitra', [AdminController::class, 'manageMitra'])->name('admin.manage.mitra');
        // tambah mitra
        Route::match (['get', 'post'], '/add/mitra', [AdminController::class, 'addMitra'])->name('admin.add.mitra');
        // edit mitra
        Route::match (['get', 'post'], '/edit/mitra/{id}', [AdminController::class, 'editMitra'])->name('admin.edit.mitra');
        // delete mitra
        Route::match (['get', 'post'], '/delete/mitra/{id}', [AdminController::class, 'deleteMitra'])->name('admin.delete.mitra');
        // manage admin
        Route::get('/admin', [AdminController::class, 'manageAdmin'])->name('admin.manage.admin');
        // tambah admin
        Route::match (['get', 'post'], '/add/admin', [AdminController::class, 'addAdmin'])->name('admin.add.admin');
        // edit admin
        Route::match (['get', 'post'], '/edit/admin/{id}', [AdminController::class, 'editAdmin'])->name('admin.edit.admin');
        // delete admin
        Route::match (['get', 'post'], '/delete/admin/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete.admin');
        // admin manage event
        // Admin Dashboard
        Route::get('event', [AdminController::class, 'manageEvent'])->name('admin.event');
    });
});
