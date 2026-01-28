<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Loan;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalItems = Item::count();
    $itemsOut = Loan::where('is_returned', false)->count();
    $myActiveLoans = Loan::where('user_id', auth()->id())->where('is_returned', false)->count();
    return view('dashboard', compact('totalItems', 'itemsOut', 'myActiveLoans'));
})->middleware(['auth', 'verified'])->name('dashboard');

// USER BIASA 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('loans', LoanController::class)->only(['index', 'create', 'store']);
    Route::post('/loans/{loan}/return', [LoanController::class, 'returnBook'])->name('loans.return');
});

// KHUSUS ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('items', ItemController::class);
});

require __DIR__.'/auth.php';
