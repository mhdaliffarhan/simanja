<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\ProdukPenyedia;
use App\Models\ProdukTransaksi;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPUnit\Framework\isEmpty;

class DetailTransaksi extends Component
{

    public $id;
    public $transaksi = [];
    public $daftar_produk_penyedia = [];
    public $daftar_produk_transaksi = [];
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
        // kosongkan daftar_produk_transaksi
        $this->daftar_produk_transaksi[$index]['produk_id'] = '';
        $this->daftar_produk_transaksi[$index]['harga'] = '';
        $this->daftar_produk_transaksi[$index]['jumlah'] = '0';
        $this->daftar_produk_transaksi[$index]['total'] = '0';
        $this->daftar_produk_transaksi[$index]['satuan'] = 'satuan';
        
        unset($this->daftar_produk_transaksi[$index]);
        $this->daftar_produk_transaksi = array_values($this->daftar_produk_transaksi);

        // Update total_kontrak
        $this->total_kontrak = 0;
        foreach ($this->daftar_produk_transaksi as $key => $item) {
            $this->total_kontrak += $item['total'];
        }
    }

    public function simpanTransaksi(){
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
            
            $transaksi = Transaksi::findOrFail($this->id);
            $transaksi->update($this->transaksi);
            
            // Ambil semua data ProdukTransaksi yang terkait dengan transaksi saat ini
            $existing_produk_transaksi = ProdukTransaksi::where('transaksi_id', $this->id)->get();
            if ($existing_produk_transaksi) {
                 // Ambil semua ID dari daftar_produk_transaksi
                $updated_ids = array_column($this->daftar_produk_transaksi, 'id');
                // Cari ID yang ada di database tetapi tidak ada di daftar_produk_transaksi
                $ids_to_delete = $existing_produk_transaksi->pluck('id')->diff($updated_ids);
                // Hapus data yang tidak ada di daftar_produk_transaksi
                ProdukTransaksi::whereIn('id', $ids_to_delete)->delete();
            }
        
            // Sinkronisasi data: Update atau buat baru
            foreach ($this->daftar_produk_transaksi as $item) {
                if (isset($item['id']) && in_array($item['id'], $updated_ids)) {
                    // Update data jika ID ada di daftar
                    $produk_transaksi = ProdukTransaksi::find($item['id']);
                    $produk_transaksi->update($item);
                } else {
                    // Create data baru jika ID tidak ditemukan
                    ProdukTransaksi::create([
                        'transaksi_id' => $this->id,
                        'produk_id' => $item['produk_id'],
                        'harga' => $item['harga'],
                        'jumlah' => $item['jumlah'],
                        'total' => $item['total'],
                    ]);
                }
            }

            Alert::success('Berhasil', 'Transaksi berhasil diperbarui!');
            return redirect()->route('detail-transaksi', ['id' => $this->id]);
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('detail-transaksi', ['id' => $this->id]);
        }
    }

    public function mount($id)
    {
        $this->id = $id;
        $transaksi = Transaksi::where('id', $id)->with('penyedia')->select('kode','tanggal','penyedia_id','nilai_kontrak','uraian_pekerjaan','tahun_anggaran','nilai')->first();
        $this->transaksi = $transaksi ? $transaksi->toArray() : [];
        $this->daftar_produk_penyedia = ProdukPenyedia::where('penyedia_id', $this->transaksi['penyedia_id'])->select('id','produk_id', 'harga')->get();
        $daftar_produk_transaksi = ProdukTransaksi::where('transaksi_id', $this->id)->select('id', 'produk_id', 'jumlah','harga', 'total')->get();
        $this->daftar_produk_transaksi = $daftar_produk_transaksi ? $daftar_produk_transaksi->toArray() : [];
        foreach ($this->daftar_produk_transaksi as $key => $item) {
            $satuan = Produk::where('id', $item['produk_id'])->select('satuan')->first();
            $satuanArray = $satuan ? $satuan->toArray() : [];
            $this->daftar_produk_transaksi[$key]['satuan'] = $satuanArray['satuan'];
        }
        $this->total_kontrak = $this->transaksi['nilai_kontrak'];
    }

    public function render()
    {
        return view('livewire.detail-transaksi')->layout('layouts.app');
    }
}
