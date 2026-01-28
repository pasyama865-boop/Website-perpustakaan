<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Item;
use App\Services\LoanService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    protected $loanService;

    // Dependency Injection: Laravel otomatis nyiapin Service-nya
    public function __construct(LoanService $loanService)
    {
        $this->loanService = $loanService;
    }

    // HALAMAN 1: List Peminjaman Saya
    public function index()
    {
        $loans = Loan::with('item')->where('user_id', Auth::id())->get();

        return view('loans.index', compact('loans'));
    }

    // HALAMAN 2: Form Pinjam Barang
    public function create()
    {
        $items = Item::all();
        return view('loans.create', compact('items'));
    }

    // AKSI 1: Simpan Peminjaman Baru
    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'return_date' => 'required|date|after:today',
        ]);

        // Kurangi Stok Dulu!
        $item = Item::find($request->item_id);
        if($item->stock < 1) {
            return back()->with('error', 'Stok habis bro!');
        }

        // Buat Peminjaman
        Loan::create([
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'return_date' => $request->return_date,
            'is_returned' => false
        ]);

        // Kurangi stok
        $item->decrement('stock');

        return redirect()->route('loans.index')->with('success', 'Berhasil pinjam!');
    }

    // AKSI 2: Kembalikan Barang (Panggil Service)
    public function returnBook(Loan $loan)
    {
        $message = $this->loanService->returnItem($loan);

        return back()->with('success', $message);
    }
}
