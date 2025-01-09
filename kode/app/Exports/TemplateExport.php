<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TemplateExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new PenyediaExport(),
            new ProdukExport(),
        ];
    }
}

class PenyediaExport implements \Maatwebsite\Excel\Concerns\FromArray
{
    public function array(): array
    {
        return [
            ['No', 'Nama Produk', 'Satuan'], // Header
            ['P001', 'Nama Produk 1', 'Satuan Produk 1'], // Contoh baris
        ];
    }
}


class ProdukExport implements \Maatwebsite\Excel\Concerns\FromArray
{

    public function array(): array
    {
        return [
            [
                'No', 
                'Nama Penyedia', 
                'Status', 
                'Alamat', 
                'Tahun Berdiri', 
                'No. HP', 
                'Email', 
                'Jenis Usaha', 
                'No. Identitas', 
                'Pengurus', 
                'Jabatan', 
                'No. Akta', 
                'Tanggal', 
                'Notaris', 
                'No. Tgl', 
                'Masa Berlaku', 
                'Instansi Pemberi', 
                'NPWP', 
                'Nama Narahubung', 
                'No. HP Narahubung', 
                'Jabatan Narahubung', 
                'Rata-rata Nilai'
            ],
            [
                'No' => 1,
                'Nama Penyedia' => 'PT Contoh Sukses',
                'Status' => 'Aktif',
                'Alamat' => 'Jl. Contoh Raya No. 123, Jakarta',
                'Tahun Berdiri' => 2000,
                'No. HP' => '081234567890',
                'Email' => 'contoh@penyedia.com',
                'Jenis Usaha' => 'Konstruksi',
                'No. Identitas' => '1234567890',
                'Pengurus' => 'Budi Santoso',
                'Jabatan' => 'Direktur',
                'No. Akta' => 'AKT123456',
                'Tanggal' => '2025-01-01',
                'Notaris' => 'Sri Notaris',
                'No. Tgl' => '123/TGL/2025',
                'Masa Berlaku' => '2030-12-31',
                'Instansi Pemberi' => 'Kementerian PU',
                'NPWP' => '12.345.678.9-012.345',
                'Nama Narahubung' => 'Andi Wijaya',
                'No. HP Narahubung' => '081987654321',
                'Jabatan Narahubung' => 'Manager Operasional',
                'Rata-rata Nilai' => 90.5
            ],
        ];
    }
}