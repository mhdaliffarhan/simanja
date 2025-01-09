<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Penyedia;
use App\Models\ProdukPenyedia;
use App\Exports\PenyediaExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DatabasePenyedia extends Component
{
    public $data_penyedia = [];

    public function mount()
    {
        $this->data_penyedia = Penyedia::with('transaksi')->get();
        foreach ($this->data_penyedia as $penyedia) {
            $rerata = $penyedia->transaksi->avg('nilai');
            $penyedia->rerata_nilai = round($rerata, 1) ?: null;
            $penyedia->predikat = $this->tentukanPredikat($penyedia->rerata_nilai);
        }
    }

    private function tentukanPredikat($nilai)
    {
        if ($nilai === null) return 'Belum Dinilai';
        if ($nilai == 3) return 'Sangat Baik';
        if ($nilai >= 2) return 'Baik';
        if ($nilai >= 1) return 'Cukup';
        if ($nilai >= 0) return 'Buruk';
    }


    public function export()
    {
        try {
            return Excel::download(new PenyediaExport, 'peneydia.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            Alert::success('Berhasil', 'Berhasil Menambah Penyedia');
            return redirect()->route('database-penyedia');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('database-penyedia');
        }
    }


    public function deletePenyedia($id)
    {
        $data = Penyedia::findOrFail($id);

        // Hapus data pegawai
        $data->delete();

        return redirect(route('database-penyedia'));
    }

    public function tambahProduk($id)
    {
        $validatedData = $this->validate([
            'tambah_produk.harga' => 'required',
        ]);

        $this->tambah_produk['penyedia_id'] = "{$id}";

        ProdukPenyedia::create($this->tambah_produk);

        // Mengosongkan input setelah penyimpanan berhasil
        $this->reset('tambah_produk');

        // Mengirimkan notifikasi keberhasilan
        Alert::success('Berhasil', 'Produk baru berhasil ditambahkan!');

        $this->redirect(route('database-penyedia'));
    }

    public function render()
    {
        return view('livewire.database-penyedia')->layout('layouts.app');
    }
}
