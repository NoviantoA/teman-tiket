<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Mitra\EventController;
use App\Http\Controllers\Mitra\BankController;
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

Route::get('/', function () {
    return view('pages.user.pages.index');
});


// Dashboard After Login
Route::get('/dashboard', function () {
    return view('pages.user.dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');




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

    // Defining Route For Bank Account Mitra
    Route::get('/mitra/bank', [BankController::class, 'get'])->name('bank.get');
    Route::post('/mitra/bank/add', [BankController::class, 'post'])->name('bank.post');
    Route::put('/mitra/bank/{id}/update', [BankController::class, 'update'])->name('bank.update');
    Route::delete('/mitra/bank/{id}/delete', [BankController::class, 'delete'])->name('bank.delete');
    
});

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
        // update admin password
        Route::match(['get', 'post'], 'update-admin-password', [AdminController::class, 'updateAdminPassword'])->name('update.admin.password');
        // check admin password
        Route::post('check-admin-password', [AdminController::class, 'checkAdminPassword'])->name('check.admin.password');
        // update admin details
        Route::match(['get', 'post'], 'update-admin-details', [AdminController::class, 'updateAdminDetails'])->name('update.admin.details');
        // update vendor details
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', [AdminController::class, 'updateVendorDetails'])->name('update.vendor.details');
    });
});
