<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Penyedia;
use App\Models\Transaksi;
use App\Models\ProdukPenyedia;

class TambahTransaksi extends Component
{
    public $transaksi = [
        'tanggal' => '',
        'penyedia_id' => '',
        'nilai_kontrak' => '',
        'uraian_pekerjaan' => '',
        'tahun_anggaran' => '',
    ];

    public $daftar_penyedia;
    public $daftar_produk_penyedia = [];

    public $daftar_produk_transaksi = [[
        'produk_id' => '',
        'harga' => '',
        'jumlah' => '',
        'total' => '',
    ]];

    public $penyedia;
    public $data_produk;

    public $formStep = 1;

    public $daftar_produk;

    public $item;

    public function updated()
    {
        // dd($this->transaksi['penyedia_id']);
        $this->daftar_produk_penyedia = ProdukPenyedia::where('penyedia_id', $this->transaksi['penyedia_id'] ?? null)->select('penyedia_id', 'produk_id')->with('penyedia', 'produk')->get();
        // dd($this->daftar_produk_penyedia);
    }

    public function mount()
    {
        $this->daftar_penyedia = Penyedia::getAll();
    }

    public function tambahTransaksi()
    {
        dd('test');
    }



    public function render()
    {
        return view('livewire.tambah-transaksi')->layout('layouts.app');
    }
}
