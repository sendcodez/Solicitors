<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitorsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PendingController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin/solicitors', [SolicitorsController::class, 'index'])->name('solicitors.index');


Route::get('admin.users', [UserController::class, 'index'])->name('users.index');
Route::post('admin.users', [UserController::class, 'store'])->name('users.store');
Route::put('admin/users/manage_users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('admin.users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('admin.solicitors', [SolicitorsController::class, 'index'])->name('solicitors.index');
Route::post('admin.solicitors', [SolicitorsController::class, 'store'])->name('solicitors.store');
Route::put('admin/solicitors/manage_solicitors/{solicitor}', [SolicitorsController::class, 'update'])->name('solicitors.update');
Route::delete('admin.solicitors/{solicitor}', [SolicitorsController::class, 'destroy'])->name('solicitors.destroy');

Route::get('admin.pending', [PendingController::class, 'index'])->name('pending.index');
Route::post('admin.pending', [PendingController::class, 'store'])->name('pending.store');
Route::put('admin/pending/{pending}', [PendingController::class, 'update'])->name('pending.update');
Route::delete('admin.pending/{pending}', [PendingController::class, 'destroy'])->name('pending.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
