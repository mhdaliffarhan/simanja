<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Penyedia;
use App\Models\Transaksi;
use App\Models\ProdukPenyedia;
use App\Models\ProdukTransaksi;
use RealRashid\SweetAlert\Facades\Alert;

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
    public $daftar_produk_penyedia;

    public $daftar_produk_transaksi = [[
        'produk_id' => '',
        'harga' => '',
        'jumlah' => '0',
        'total' => '0',
        'satuan' => 'satuan',
    ]];

    public $total_kontrak = 0;

    public function updatedTransaksiPenyediaId($value)
    {
        if ($value) {
            $this->daftar_produk_penyedia = ProdukPenyedia::where('penyedia_id', $value)
                ->with('produk')
                ->get();
        } else {
            $this->daftar_produk_penyedia = [];
        }
    }

    public function updatedDaftarProdukTransaksi($value, $name){
        if (preg_match('/(\d+)\.produk_id/', $name, $matches)) {
            $index = $matches[1]; // Get the index
            $produkId = $value; // The selected product ID
            // Find the selected product's details
            $produk = ProdukPenyedia::where('produk_id', $produkId)
                ->with('produk')
                ->first();
            // Update the corresponding price field
            if ($produk) {
                $this->daftar_produk_transaksi[$index]['harga'] = $produk->harga ?? 0;
                $this->daftar_produk_transaksi[$index]['satuan'] = $produk->produk->satuan ?? '';
            } else {
                $this->daftar_produk_transaksi[$index]['harga'] = 0; // Reset price if no product found
            }
        } elseif (preg_match('/(\d+)\.jumlah/', $name, $matches)) {
            $index = $matches[1];
            $jumlah = $value;
            if ($jumlah) {
                $this->daftar_produk_transaksi[$index]['total'] = $jumlah * $this->daftar_produk_transaksi[$index]['harga'];
                $this->total_kontrak = 0;
                foreach ($this->daftar_produk_transaksi as $key => $item) {
                    $this->total_kontrak += $item['total'];
                }
            } else {
                $this->daftar_produk_transaksi[$index]['total'] = 0;
            }
        } elseif (preg_match('/(\d+)\.harga/', $name, $matches)) {
            $index = $matches[1];
            $harga = $value;
            $this->total_kontrak = 0;
            if ($harga) {
                $this->daftar_produk_transaksi[$index]['total'] = $harga * $this->daftar_produk_transaksi[$index]['jumlah'];
                $this->total_kontrak = 0;
                foreach ($this->daftar_produk_transaksi as $key => $item) {
                    $this->total_kontrak += $item['total'];
                }
            } else {
                $this->daftar_produk_transaksi[$index]['total'] = 0;
            }
        }
    }

    public function tambahTransaksi(){
        try {
            $this->transaksi['nilai_kontrak'] = $this->total_kontrak;
            $validateData = $this->validate([
                'transaksi.tanggal' => 'required|date',
                'transaksi.penyedia_id' => 'required',
                'transaksi.nilai_kontrak' => 'required',
                'transaksi.uraian_pekerjaan' => 'required',
                'transaksi.tahun_anggaran' => 'required',
                'daftar_produk_transaksi.*.produk_id' => 'required',
                'daftar_produk_transaksi.*.jumlah' => 'required',
                'daftar_produk_transaksi.*.harga' => 'required',
            ],[
                'transaksi.tanggal.required' => 'Tanggal transaksi wajib diisi.',
                'transaksi.penyedia_id.required' => 'Penyedia wajib diisi.',
                'transaksi.nilai_kontrak.required' => 'Nilai kontrak wajib diisi.',
                'transaksi.uraian_pekerjaan.required' => 'Uraian pekerjaan wajib diisi.',
                'transaksi.tahun_anggaran.required' => 'Tahun anggaran wajib diisi.',
                'daftar_produk_transaksi.*.produk_id.required' => 'Produk wajib diisi.',
                'daftar_produk_transaksi.*.jumlah.required' => 'Jumlah wajib diisi.',
                'daftar_produk_transaksi.*.harga.required' => 'Harga wajib diisi.',
            ]);
            $transaksi = Transaksi::create([
                'tanggal' => $this->transaksi['tanggal'],
                'penyedia_id' => $this->transaksi['penyedia_id'],
                'nilai_kontrak' => $this->transaksi['nilai_kontrak'],
                'uraian_pekerjaan' => $this->transaksi['uraian_pekerjaan'],
                'tahun_anggaran' => $this->transaksi['tahun_anggaran'],
            ]);
    
            foreach ($this->daftar_produk_transaksi as $item) {
                $produk_transaksi = ProdukTransaksi::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $item['produk_id'],
                    'jumlah' => $item['jumlah'],
                    'harga' => $item['harga'],
                    'total' => $item['total'],
                ]);
            }

            // update data harga produk penyedia berdasarkan inputan harga pada produk transaksi
            foreach ($this->daftar_produk_transaksi as $item) {
                $produk_penyedia = ProdukPenyedia::find($item['produk_id']);
                if ($produk_penyedia) {
                    $produk_penyedia->harga = $item['harga'];
                    $produk_penyedia->save();
                }
            }
    
            $this->transaksi = [
                'tanggal' => '',
                'penyedia_id' => '',
                'nilai_kontrak' => '',
                'uraian_pekerjaan' => '',
                'tahun_anggaran' => '',
            ];
    
            $this->daftar_produk_transaksi = [[
                'produk_id' => '',
                'harga' => '',
                'jumlah' => '0',
                'total' => '0',
                'satuan' => 'satuan',
            ]];
    
            $this->total_kontrak = 0;
    
            Alert::success('Berhasil', 'Transaksi berhasil ditambahkan!');
            return redirect()->route('transaksi');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('tambah-transaksi');
        }
        
    }

    public function tambahProdukTransaksi(){
        $this->daftar_produk_transaksi[] = [
            'produk_id' => '',
            'harga' => '',
            'jumlah' => '0',
            'total' => '0',
            'satuan' => 'satuan',
        ];
    }

    public function hapusProdukTransaksi($index){
        unset($this->daftar_produk_transaksi[$index]);
        $this->daftar_produk_transaksi = array_values($this->daftar_produk_transaksi);

        // Update total_kontrak
        $this->total_kontrak = 0;
        foreach ($this->daftar_produk_transaksi as $key => $item) {
            $this->total_kontrak += $item['total'];
        }
    }

    public function mount()
    {
        $this->daftar_penyedia = Penyedia::getAll();
        $this->daftar_produk_penyedia = [];
        $this->transaksi['tanggal'] = date('Y-m-d');
        $this->transaksi['tahun_anggaran'] = date('Y');
    }


    public function render()
    {
        return view('livewire.tambah-transaksi',[
            'daftar_produk_penyedia' => $this->daftar_produk_penyedia,
            'transaksi' => $this->transaksi,
        ])->layout('layouts.app');
    }
}
