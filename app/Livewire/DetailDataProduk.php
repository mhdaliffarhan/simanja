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
            $this->dispatch('edit-produk');
        } catch (ValidationException $e) {
            // Tangkap kesalahan validasi dan reset data input
            $this->resetErrorBag();
            $this->resetValidation();

            // Ulangkan kesalahan agar bisa ditangani oleh Livewire
            throw $e;
        } catch (\Exception $e) {
            // Tangkap error lain dan tampilkan pesan error
            $this->addError('general', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.detail-data-produk')->layout('layouts.app');
    }
}
