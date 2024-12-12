<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Penyedia;
use App\Models\Transaksi;
use App\Models\ProdukPenyedia;
use App\Models\ProdukTransaksi;

use function PHPUnit\Framework\isEmpty;

class DetailTransaksi extends Component
{

    public $data_penyedia;
    public $data_produk;
    public $transaksi = [
        'tanggal' => '',
        'penyedia_id' => '',
        'nilai_kontrak' => '',
        'keterangan' => '',
        'tahun_anggaran' => '',
    ];
    public $produk_transaksi = [];
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $data_transaksi = Transaksi::find($id);
        // Jika transaksi ditemukan, assign ke property $transaksi
        if ($data_transaksi) {
            $this->transaksi = [
                'tanggal' => $data_transaksi->tanggal,
                'penyedia_id' => $data_transaksi->penyedia_id,
                'nilai_kontrak' => $data_transaksi->nilai_kontrak,
                'keterangan' => $data_transaksi->keterangan,
                'tahun_anggaran' => $data_transaksi->tahun_anggaran,
            ];

            // Ambil data penyedia terkait (opsional)
            $this->data_penyedia = Penyedia::find($data_transaksi->penyedia_id);
            $this->data_produk = ProdukPenyedia::where('penyedia_id', $this->data_penyedia->id)
                ->with('penyedia', 'produk')
                ->get();
            // dd($this->data_produk);
            // Ambil data produk terkait transaksi
            $this->produk_transaksi = ProdukTransaksi::where('transaksi_id', $id)
                ->with('produk') // Include data produk jika diperlukan
                ->get()
                ->toArray();
        } else {
            // Jika tidak ditemukan, beri pesan atau log error
            session()->flash('error', 'Transaksi tidak ditemukan.');
            return redirect()->route('detail-transaksi', ['id' => $this->id]);
        }
        // dd($this->transaksi);
    }
    public function simpanTransaksi()
    {
        // Validasi input
        $validateData = $this->validate([
            'transaksi.tanggal' => 'required|date',
        ]);

        $total_kontrak = 0;
        foreach ($this->data_produk as $key => $item) {
            $total_kontrak += $item->harga * $this->produk_transaksi[$key]['jumlah'];
        }

        // Perbarui data transaksi
        $transaksi = Transaksi::findOrFail($this->id); // Cari transaksi berdasarkan ID
        $this->transaksi['nilai_kontrak'] = $total_kontrak;

        $transaksi->update($this->transaksi);

        // Hapus produk transaksi lama terkait transaksi ini
        ProdukTransaksi::where('transaksi_id', $this->id)->delete();

        // Tambahkan produk transaksi baru
        foreach ($this->data_produk as $key => $item) {
            if (isEmpty($this->produk_transaksi[$key]['jumlah'])) {
                $this->produk_transaksi[$key]['total'] = 0;
            } else {
                $this->produk_transaksi[$key]['produk_id'] = $item->id;
                $this->produk_transaksi[$key]['transaksi_id'] = $this->id;
                $this->produk_transaksi[$key]['total'] = $this->produk_transaksi[$key]['jumlah'] * $item->harga;
            }
        }

        foreach ($this->produk_transaksi as $key => $produk_transaksi) {
            if ($produk_transaksi['jumlah'] > 0) {
                ProdukTransaksi::create($produk_transaksi);
            }
        }

        toast('Berhasil memperbarui transaksi!', 'success');
        // Redirect ke halaman detail penyedia
        return redirect()->route('detail-transaksi', ['id' => $this->id]);
    }


    public function render()
    {
        return view('livewire.detail-transaksi')->layout('layouts.app');
    }
}
