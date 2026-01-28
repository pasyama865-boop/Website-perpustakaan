<?php

namespace App\Services;

use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class LoanService
{
    public function returnItem(Loan $loan)
    {
        if ($loan->is_returned) {
            return "Barang ini sudah dikembalikan sebelumnya.";
        }

        return DB::transaction(function () use ($loan) {

            $loan->update([
                'is_returned' => true
            ]);
            $loan->item->increment('stock');

            return "Berhasil dikembalikan! Stok barang bertambah.";
        });
    }
}
