<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\LogNilai;
use App\Models\Penyedia;
use App\Models\Transaksi;
use App\Exports\AllExport;
use App\Models\AspekKinerja;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class Dashboard extends Component
{
    public $jumlah_penyedia;
    public $jumlah_produk;
    public $jumlah_transaksi;
    public $produk_terlaris;
    public $penyedia_terlaris;
    public $transaksi_belum_dinilai;
    public $aspek_kinerja;
    public $penyedia_nilai_tertinggi;

    public function mount()
    {
        $this->jumlah_penyedia = Penyedia::count();
        $this->jumlah_produk = Produk::count();
        $this->jumlah_transaksi = Transaksi::count();
        $this->produk_terlaris = Produk::withCount('produkTransaksi')->orderBy('produk_transaksi_count', 'desc')->take(5)->get();
        $this->penyedia_terlaris = Penyedia::withCount('transaksi')->orderBy('transaksi_count', 'desc')->take(5)->get();

        $this->transaksi_belum_dinilai = Transaksi::where('nilai', null)->with('penyedia')->get();
        $this->aspek_kinerja = AspekKinerja::all()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'aspek_kinerja' => $item->aspek_kinerja,
                    'bobot' => $item->bobot,
                    'nilai' => null, // Nilai default
                ];
            })
            ->toArray();
        $this->penyedia_nilai_tertinggi = Penyedia::with('transaksi')->select('penyedias.*', DB::raw('ROUND(AVG(transaksis.nilai), 1) as nilai_rata_rata'))->join('transaksis', 'penyedias.id', '=', 'transaksis.penyedia_id')->groupBy('penyedias.id')->orderBy('nilai_rata_rata', 'desc')->take(5)->get();
    }

    public function exportAll()
    {
        try {
            return Excel::download(new AllExport(), 'Data-Pengadaan-Barang-dan-Jasa.xlsx');
            Alert::success('Berhasil', 'Berhasil Menambah Produk');
            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('dashboard');
        }
    }

    public function nilaiTransaksi($id)
    {
        $nilai = 0;
        // Log Nilai
        foreach ($this->aspek_kinerja as $key => $aspek) {
            $nilai = $nilai + $aspek['nilai'] * $aspek['bobot'] * 0.01;

            $log_nilai = [
                'transaksi_id' => $id,
                'aspek_kinerja_id' => $aspek['id'],
                'nilai_kinerja' => $aspek['nilai'],
            ];
            LogNilai::create($log_nilai);
        }
        // Perbarui Nilai pada Transaksi
        $transaksi = Transaksi::find($id);
        $transaksi->nilai = $nilai;
        $transaksi->update();

        Alert::success('Berhasil', 'Berhasil menilai transaksi!');

        // Redirect ke halaman detail penyedia
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');
    }
}
