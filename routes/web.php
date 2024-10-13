<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PembelianMinumanController;

Route::get('/', function () {
    return view('auth/login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard ');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     Route::middleware(['auth', 'admin'])->group(function () {



//         // Route::get('admin/dashboard', [PostController::class, 'index']);
//         // Route::get('admin/pegawai', [PostController::class, 'tabel']);
//         // Route::get('admin/create', [PostController::class, 'create']);
//         // Route::post('admin/store', [PostController::class, 'store']);
//         // Route::get('admin/edit/{id}', [PostController::class, 'edit']);
//         // Route::put('admin/update/{id}', [PostController::class, 'update']);
//         // Route::get('admin/show/{id}', [PostController::class, 'show']);
//         // Route::delete('admin/destroy/{id}', [PostController::class, 'destroy']);

//         // Route::get('admin/table/dashboard', [TableController::class, 'index']);
//         // Route::get('admin/table/create', [TableController::class, 'create']);
//         // Route::post('admin/table/store', [TableController::class, 'store']);
//         // Route::get('admin/table/edit/{id}', [TableController::class, 'edit']);
//         // Route::put('admin/table/update/{id}', [TableController::class, 'update']);
//         // Route::delete('admin/table/destroy/{id}', [TableController::class, 'destroy']);

//     });
// });

Route::get('dashboard', [UserController::class, 'index']);


Route::get('/lapangan', [LapanganController::class, 'index']);
Route::get('/booking', [BookingController::class, 'index']);
Route::get('/events', [EventsController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

// Route Bokking
Route::get('/dashboard/booking', [BookingController::class, 'indexAdmin'])->name('admin.booking');
Route::get('/dashboard/booking/create', [BookingController::class, 'create'])->name('admin.booking.create');
Route::post('/dashboard/booking/store', [BookingController::class, 'store'])->name('admin.booking.store');
Route::get('/dashboard/booking/{id}/edit', [BookingController::class, 'edit'])->name('admin.booking.edit');
Route::put('/dashboard/booking/{id}', [BookingController::class, 'update'])->name('admin.booking.update');
Route::delete('/dashboard/booking/{id}', [BookingController::class, 'destroy'])->name('admin.booking.destroy');

// Route Events
Route::get('/dashboard/events', [EventsController::class, 'indexAdmin'])->name('admin.events');
Route::get('/dashboard/events/create', [EventsController::class, 'create'])->name('admin.events.create');
Route::post('/dashboard/events/store', [EventsController::class, 'store'])->name('admin.events.store');
Route::get('/dashboard/events/{id}/edit', [EventsController::class, 'edit'])->name('admin.events.edit');
Route::put('/dashboard/events/{id}', [EventsController::class, 'update'])->name('admin.events.update');
Route::delete('/dashboard/events/{id}', [EventsController::class, 'destroy'])->name('admin.events.destroy');

// Route Lapangan
Route::get('/dashboard/lapangan', [LapanganController::class, 'indexAdmin'])->name('admin.lapangan');
Route::get('/dashboard/lapangan/create', [LapanganController::class, 'create'])->name('admin.lapangan.create');
Route::post('/dashboard/lapangan/store', [LapanganController::class, 'store'])->name('admin.lapangan.store');
Route::get('/dashboard/lapangan/{id}/edit', [LapanganController::class, 'edit'])->name('admin.lapangan.edit');
Route::put('/dashboard/lapangan/{id}', [LapanganController::class, 'update'])->name('admin.lapangan.update');
Route::delete('/dashboard/lapangan/{id}', [LapanganController::class, 'destroy'])->name('admin.lapangan.destroy');


// Route Minuman
Route::get('/dashboard/minuman', [MinumanController::class, 'indexAdmin'])->name('admin.minuman');
Route::get('/dashboard/minuman/create', [MinumanController::class, 'create'])->name('admin.minuman.create');
Route::post('/dashboard/minuman/store', [MinumanController::class, 'store'])->name('admin.minuman.store');
Route::get('/dashboard/minuman/{id}/edit', [MinumanController::class, 'edit'])->name('admin.minuman.edit');
Route::put('/dashboard/minuman/{id}', [MinumanController::class, 'update'])->name('admin.minuman.update');
Route::delete('/dashboard/minuman/{id}', [MinumanController::class, 'destroy'])->name('admin.minuman.destroy');


Route::get('/dashboard/pembelian-minuman', [PembelianMinumanController::class, 'index'])->name('admin.pembelian-minuman');
Route::get('/dashboard/pembelian-minuman/create', [PembelianMinumanController::class, 'create'])->name('admin.pembelian-minuman.create');
Route::post('/dashboard/pembelian-minuman/store', [PembelianMinumanController::class, 'store'])->name('admin.pembelian-minuman.store');
Route::get('/dashboard/pembelian-minuman/{id}/edit', [PembelianMinumanController::class, 'edit'])->name('admin.pembelian-minuman.edit');
Route::put('/dashboard/pembelian-minuman/{id}', [PembelianMinumanController::class, 'update'])->name('admin.pembelian-minuman.update');
Route::delete('/dashboard/pembelian-minuman/{id}', [PembelianMinumanController::class, 'destroy'])->name('admin.pembelian-minuman.destroy');


// Route User
Route::get('/dashboard/AddUser', [AddUserController::class, 'index'])->name('admin.AddUser');
Route::get('/dashboard/AddUser/create', [AddUserController::class, 'create'])->name('admin.AddUser.create');
Route::post('/dashboard/AddUser/store', [AddUserController::class, 'store'])->name('admin.AddUser.store');
Route::get('/dashboard/AddUser/{id}/edit', [AddUserController::class, 'edit'])->name('admin.AddUser.edit');
Route::put('/dashboard/AddUser/{id}', [AddUserController::class, 'update'])->name('admin.AddUser.update');
Route::delete('/dashboard/AddUser/{id}', [AddUserController::class, 'destroy'])->name('admin.AddUser.destroy');




require __DIR__.'/auth.php';
