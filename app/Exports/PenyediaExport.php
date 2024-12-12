<?php

namespace App\Exports;

use App\Models\Penyedia;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenyediaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Menggunakan eager loading untuk menghindari N+1 problem
        $penyedia = Penyedia::with('transaksi')->get();

        $data = [];
        $no = 1;

        foreach ($penyedia as $item) {
            // Menghitung rata-rata nilai transaksi dengan fallback null jika tidak ada nilai
            $rerata = $item->transaksi->avg('nilai');
            $rerataNilai = round($rerata, 1) ?: null;

            $data[] = [
                'No' => $no++,
                'Nama Penyedia' => $item->nama,
                'Status' => $item->status,
                'Alamat' => $item->alamat,
                'Tahun Berdiri' => $item->tahun_berdiri,
                'No. HP' => $item->nohp,
                'Email' => $item->email,
                'Jenis Usaha' => $item->jenis_usaha,
                'No. Identitas' => $item->no_identitas,
                'Pengurus' => $item->pengurus,
                'Jabatan' => $item->jabatan,
                'No. Akta' => $item->no_akta,
                'Tanggal' => $item->tanggal,
                'Notaris' => $item->notaris,
                'No. Tgl' => $item->no_tgl,
                'Masa Berlaku' => $item->masa_berlaku,
                'Instansi Pemberi' => $item->instansi_pemberi,
                'NPWP' => $item->npwp,
                'Nama Narahubung' => $item->nama_narahubung,
                'No. HP Narahubung' => $item->nohp_narahubung,
                'Jabatan Narahubung' => $item->jabatan_narahubung,
                'Rata-rata Nilai' => $rerataNilai,
            ];
        }

        return collect($data);
    }

    public function headings(): array
    {
        return [
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
            'Rata-rata Nilai',
        ];
    }
}
