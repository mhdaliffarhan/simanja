<?php

namespace App\Exports;

use App\Models\Transaksi;
use App\Models\ProdukTransaksi;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class TransaksiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Eager loading relasi
        $produkTransaksi = ProdukTransaksi::with([
            'transaksi.penyedia.produkPenyedia',
            'produk'
        ])->get();

        $data = [];
        $no = 1;

        foreach ($produkTransaksi as $item) {
            // Mengambil data dari relasi
            $transaksi = $item->transaksi;
            $penyedia = $transaksi->penyedia;
            $produk = $item->produk;
            // dd($item);

            $data[] = [
                'No' => $no++,
                'Kode Transaksi' => $transaksi->kode,
                'Tanggal Transaksi' => $transaksi->tanggal,
                'Nama Badan Usaha' => $penyedia->nama ?? '-',
                'Kode Produk' => $produk->kode ?? '-',
                'Nama Produk' => $produk->nama ?? '-',
                'Jumlah' => $item->jumlah,
                'Satuan' => $produk->satuan ?? '-',
                'Harga' => $item->harga,
                'Total' => $item->total,
                'Nilai Kontrak' => $transaksi->nilai_kontrak,
                'Nama Paket Pengadaan' => $transaksi->keterangan,
                'Tahun Anggaran' => $transaksi->tahun_anggaran,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'No',
            'ID Transaksi',
            'Tanggal Transaksi',
            'Nama Badan Usaha',
            'Kode Produk',
            'Nama Produk',
            'Jumlah',
            'Satuan',
            'Harga',
            'Total',
            'Nilai Kontrak',
            'Nama Paket Pengadaan',
            'Tahun Anggaran'
        ];
    }
}
