<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProdukPenyedia;
use RealRashid\SweetAlert\Facades\Alert;
use Dotenv\Exception\ValidationException;

class DetailDataProdukPenyedia extends Component
{
    public $get_produk;
    public $produk_penyedia;
    public function mount($id)
    {
        $this->get_produk = ProdukPenyedia::with(['produk', 'penyedia'])->find($id);
        $this->produk_penyedia = $this->get_produk ? $this->get_produk->toArray() : [];
        // dd($this->produk_penyedia);
    }

    public function simpan($id)
    {
        try {
            $validated = $this->validate([
                'produk_penyedia.harga' => 'required|numeric|min:1'
            ]);

            // Simpan Perubahan ke Database
            $this->get_produk->update($validated['produk_penyedia']);

            // Kirim pesan sukses
            Alert::success('Berhasil', 'Berhasil memperbarui data produk penyedia!');
            return redirect()->route('detail-data-penyedia', ['id' => $this->produk_penyedia['penyedia_id']]);
        } catch (\Throwable $th) {
            // Kirim pesan error untuk validasi
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('detail-data-produk-penyedia', ['id' => $id]);
        }
    }

    public function render()
    {
        return view('livewire.detail-data-produk-penyedia')->layout('layouts.app');
    }
}
