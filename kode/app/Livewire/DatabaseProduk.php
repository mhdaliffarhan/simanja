<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DatabaseProduk extends Component
{
    public $data_produk = [];
    public $tambah_produk = [
        'kode' => '',
        'nama' => '',
        'satuan' => ''
    ];

    public $edit_produk = [
        'kode' => '',
        'nama' => '',
        'satuan' => ''
    ];

    public function mount()
    {
        $this->data_produk = Produk::getAll();
        // dd($this->data_produk);
    }

    public function export()
    {
        try {
            return Excel::download(new ProdukExport, 'produk.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            Alert::success('Berhasil', 'Berhasil Menambah Produk');
            return redirect()->route('database-produk');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('database-produk');
        }
    }


    public function tambahProduk()
    {
        try {
            $validatedData = $this->validate([
                'tambah_produk.nama' => 'required|string|max:255|unique:produks,nama',
                'tambah_produk.satuan' => 'required|string|max:255',
            ]);

            Produk::create($validatedData['tambah_produk']);

            $this->reset('tambah_produk');

            Alert::success('Berhasil', 'Berhasil Menambah Produk');
            return redirect()->route('database-produk');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('database-produk');
        }
    }


    public function deleteProduk($id)
    {
        $data = Produk::findOrFail($id);

        // Hapus data pegawai
        $data->delete();
        Alert::success('Berhasil', 'Berhasil Menghapus Produk');

        return redirect(route('database-produk'));
    }

    public function render()
    {
        return view('livewire.database-produk')->layout('layouts.app');
    }
}
