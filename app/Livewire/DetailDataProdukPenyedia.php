<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProdukPenyedia;

class DetailDataProdukPenyedia extends Component
{
    public $Produk_penyedia;
    public function mount($id)
    {
        $this->Produk_penyedia = ProdukPenyedia::with(['produk', 'penyedia'])->find($id);
        dd($this->Produk_penyedia);
    }

    public function simpan() {}

    public function render()
    {
        return view('livewire.detail-data-produk-penyedia')->layout('layouts.app');
    }
}
