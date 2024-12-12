<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Penyedia;
use App\Models\Transaksi;
use App\Models\ProdukPenyedia;

class TambahTransaksi extends Component
{
    public $tambah_transaksi = [
        'tanggal' => '',
        'penyedia_id' => '',
    ];
    public $daftar_transaksi;
    public $daftar_penyedia;
    public $daftar_produk_penyedia;

    public $produk_transaksi = [];

    public $penyedia;
    public $data_produk;

    public $formStep = 1;

    public $daftar_produk;

    public $item;


    public function mount()
    {
        $this->daftar_transaksi = Transaksi::getAll();
        $this->daftar_penyedia = Penyedia::getAll();
    }

    public function tambah_input_produk_transaksi()
    {
        $this->produk_transaksi[] = [
            'transaksi_id' => '',
            'produk_id' => '',
            'jumlah' => '',
            'total' => '',
        ];
        // dd($this->produk_transaksi);
    }

    public function nextStep()
    {
        $this->formStep++;
        // dd($this->formStep);
        $id = $this->tambah_transaksi['penyedia_id'];
        $this->data_produk = ProdukPenyedia::where('penyedia_id', $id)
            ->with('penyedia', 'produk')
            ->get();
        $this->penyedia = Penyedia::findOrFail($id);
        $this->item = $this->penyedia;
        $count = count($this->data_produk);
        for ($i = 0; $i < $count; $i++) {
            $this->produk_transaksi[] = [
                'transaksi_id' => '',
                'produk_id' => '',
                'jumlah' => '',
                'total' => '',
            ];
        }
    }

    public function backStep()
    {
        $this->formStep--;
    }

    public function tambahTransaksi()
    {
        dd('test');
    }



    public function render()
    {
        $this->daftar_produk_penyedia = ProdukPenyedia::select('penyedia_id', 'produk_id')->with('penyedia', 'produk')->get();
        return view('livewire.tambah-transaksi')->layout('layouts.app');
    }
}
