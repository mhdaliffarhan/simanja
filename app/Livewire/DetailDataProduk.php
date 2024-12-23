<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class DetailDataProduk extends Component
{
    public $produk;
    public $data_produk;

    public function mount($id)
    {
        $this->produk = Produk::findOrFail($id);
        $this->data_produk = $this->produk ? $this->produk->toArray() : [];
    }

    public function simpan()
    {
        try {
            // Validasi data input
            $validated = $this->validate([
                'data_produk.nama' => 'required|string|max:255',
                'data_produk.satuan' => 'required|string|max:100',
            ]);

            // Simpan perubahan ke database
            $this->produk->update($validated['data_produk']);

            // Kirim pesan sukses
            Alert::success('Berhasil', 'Berhasil memperbarui data produk!');
            return redirect()->route('database-produk');
        } catch (\Throwable $th) {
            // Kirim pesan error untuk validasi
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('detail-data-produk', ['id' => $this->data_produk['id']]);
        }
    }

    public function render()
    {
        return view('livewire.detail-data-produk')->layout('layouts.app');
    }
}
