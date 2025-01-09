<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AllExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Produk' => new ProdukExport(),
            'Penyedia' => new PenyediaExport(),
            'Transaksi' => new TransaksiExport(),
        ];
    }
}
