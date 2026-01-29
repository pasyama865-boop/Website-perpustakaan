<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Loan;

// HALAMAN DEPAN
Route::get('/', function () {
    return view('welcome');
});

// WAJIB LOGIN & WAJIB VERIFIKASI EMAIL
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $totalItems = Item::count();
        $itemsOut = Loan::where('is_returned', false)->count();
        $myActiveLoans = Loan::where('user_id', auth()->id())->where('is_returned', false)->count();

        return view('dashboard', compact('totalItems', 'itemsOut', 'myActiveLoans'));
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('loans', LoanController::class)->only(['index', 'create', 'store']);
    Route::post('/loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return');
});

// GROUP KHUSUS ADMIN (Login + Verified + Admin)
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('items', ItemController::class);
});

require __DIR__.'/auth.php';
