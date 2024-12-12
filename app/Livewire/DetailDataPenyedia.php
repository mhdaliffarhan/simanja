<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Penyedia;
use App\Models\Transaksi;
use App\Models\ProdukPenyedia;
use App\Models\ProdukTransaksi;
use PhpParser\Node\Stmt\Foreach_;
use RealRashid\SweetAlert\Facades\Alert;

class DetailDataPenyedia extends Component
{
    public $penyedia;
    public $data_penyedia;
    public $data_produk;
    public $opsi_produk;
    public $tambah_produk = [
        'penyedia_id' => '',
        'produk_id' => '',
        'harga' => '',
    ];
    public $transaksi = [
        'tanggal' => '',
        'penyedia_id' => '',
        'nilai_kontrak' => '',
        'keterangan' => '',
        'tahun_anggaran' => '',
    ];
    public $produk_transaksi = [];

    public $item;
    public $daftar_transaksi;
    public $produk;
    public function mount($id)
    {
        $this->penyedia = Penyedia::findOrFail($id);
        $this->data_penyedia = $this->penyedia ? $this->penyedia->toArray() : [];
        // dd($this->data_penyedia);
        $this->opsi_produk = Produk::getAll();
        $this->data_produk = ProdukPenyedia::where('penyedia_id', $id)
            ->with('penyedia', 'produk')
            ->get();
        $this->item = $this->penyedia;
        // dd($this->data_produk);
        $count = count($this->data_produk);
        for ($i = 0; $i < $count; $i++) {
            $this->produk_transaksi[] = [
                'transaksi_id' => '',
                'produk_id' => '',
                'jumlah' => '0',
                'total' => '',
            ];
        }

        $this->daftar_transaksi = Transaksi::where('penyedia_id', $id)->with('penyedia')->get();
        // dd($this->daftar_transaksi);

        $this->produk = ProdukPenyedia::where('penyedia_id', $id)->with('produk.produkTransaksi')->get();
        // dd($this->produk);
    }

    public function simpan()
    {
        $this->validate([
            'data_penyedia.nama' => 'required|string|max:255',
            'data_penyedia.status' => 'required|string|max:100',
            'data_penyedia.alamat' => 'required|string|max:500',
            'data_penyedia.tahun_berdiri' => 'nullable|integer|min:1900|max:' . date('Y'),
            'data_penyedia.nohp' => 'required|string|max:15',
            'data_penyedia.email' => 'required|email|max:255',
            'data_penyedia.jenis_usaha' => 'required|string|max:100',
            'data_penyedia.no_identitas' => 'nullable|string|max:50',
            'data_penyedia.pengurus' => 'nullable|string|max:255',
            'data_penyedia.jabatan' => 'nullable|string|max:100',
            'data_penyedia.no_akta' => 'nullable|string|max:50',
            'data_penyedia.notaris' => 'nullable|string|max:255',
            'data_penyedia.no_tgl' => 'nullable|string|max:50',
            'data_penyedia.masa_berlaku' => 'nullable|string|max:255',
            'data_penyedia.instansi_pemberi' => 'nullable|string|max:255',
            'data_penyedia.npwp' => 'nullable|string|max:20',
            'data_penyedia.nama_narahubung' => 'required|string|max:255',
            'data_penyedia.nohp_narahubung' => 'required|string|max:255',
            'data_penyedia.jabatan_narahubung' => 'required|string|max:255',

        ]);

        $this->penyedia->update($this->data_penyedia);

        toast('Berhasil memperbarui data penyedia', 'success');

        // Redirect ke halaman detail penyedia
        return redirect()->route('detail-data-penyedia', ['id' => $this->penyedia->id]);
    }

    public function tambahProduk($id)
    {
        $validatedData = $this->validate([
            'tambah_produk.harga' => 'required',
        ]);

        $this->tambah_produk['penyedia_id'] = $this->penyedia->id;

        ProdukPenyedia::create($this->tambah_produk);

        // Mengosongkan input setelah penyimpanan berhasil
        $this->reset('tambah_produk');

        Alert::success('Berhasil', 'Produk Baru Berhasil Ditambahkan');

        // Redirect ke halaman detail penyedia
        return redirect()->route('detail-data-penyedia', ['id' => $this->penyedia->id]);
    }

    public function deleteProduk($id)
    {
        $data = ProdukPenyedia::find($id);

        $data->delete();

        toast('Berhasil menghapus produk!', 'success');
        // Redirect ke halaman detail penyedia
        return redirect()->route('detail-data-penyedia', ['id' => $this->penyedia->id]);
    }

    public function tambahTransaksi($id)
    {
        // BUAT DATABASE TRANSAKSI
        $validateData = $this->validate([
            'transaksi.tanggal' => 'required|date',
        ]);

        $total_kontrak = 0;
        foreach ($this->data_produk as $key => $item) {
            $total_kontrak = $total_kontrak + ($item->harga * $this->produk_transaksi[$key]['jumlah']);
        }
        $this->transaksi['penyedia_id'] = "{$id}";
        $this->transaksi['nilai_kontrak'] = $total_kontrak;

        // dd($this->transaksi);
        $transaksi = Transaksi::create($this->transaksi);

        // BUAT DATABASE PRODUK TRANSAKSI
        foreach ($this->data_produk as $key => $item) {
            $this->produk_transaksi[$key]['produk_id'] = $item->id;
            $this->produk_transaksi[$key]['transaksi_id'] = $transaksi->id;
            $this->produk_transaksi[$key]['harga'] = $item->harga;
            $this->produk_transaksi[$key]['total'] = $this->produk_transaksi[$key]['jumlah'] * $item->harga;
            // $this->produk_transaksi[$key]['transaksi_id'] = ;
        }
        foreach ($this->produk_transaksi as $key => $produk_transaksi) {
            if ($produk_transaksi['jumlah'] > 0) {
                ProdukTransaksi::create($produk_transaksi);
            }
        }

        toast('Berhasil menambah transaksi!', 'success');
        // Redirect ke halaman detail penyedia
        return redirect()->route('detail-data-penyedia', ['id' => $this->penyedia->id]);
    }

    public function deleteTransaksi($id)
    {
        // DELETE PRODUK TRANSAKSI
        ProdukTransaksi::where('transaksi_id', $id)->delete();
        $data = Transaksi::find($id);

        $data->delete();

        toast('Berhasil menghapus transaksi!', 'success');
        // Redirect ke halaman detail penyedia
        return redirect()->route('detail-data-penyedia', ['id' => $this->penyedia->id]);
    }
    public function getTotal($key)
    {
        return ($this->produk_transaksi[$key]['jumlah'] ?? 0) * $this->data_produk[$key]->harga;
    }

    public function render()
    {

        return view('livewire.detail-data-penyedia')->layout('layouts.app');
    }
}
