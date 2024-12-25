<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaksi;
use App\Models\AspekKinerja;

class Nilai extends Component
{
    public $aspek_kinerja;
    public $transaksi;

    public $kualitas, $biaya, $waktu, $layanan;
    public $skor_waktu, $skor_layanan;
    public $skor_kualitas = 0; // Nilai awal
    public $kinerja_kualitas = 0; // Nilai kinerja untuk kualitas

    // Properti lain jika diperlukan
    public $skor_biaya = 0;
    public $kinerja_biaya = 0;

    public $total_kinerja = 0;
    public $predikat = '';

    public function updated()
    {
        $this->hitungKinerja();
    }

    public function hitungKinerja()
    {
        $this->total_kinerja = (
            (30 * $this->skor_kualitas) +
            (20 * $this->skor_biaya) +
            (30 * $this->skor_waktu) +
            (20 * $this->skor_layanan)
        ) / 100;

        $this->predikat = $this->tentukanPredikat($this->total_kinerja);
    }

    private function tentukanPredikat($nilai)
    {
        if ($nilai >= 2.5) return 'Sangat Baik';
        if ($nilai >= 2) return 'Baik';
        return 'Cukup';
    }
    public function mount($id)
    {
        $this->transaksi = Transaksi::findorFail($id);
    }

    public function render()
    {
        $aspek_kinerja = AspekKinerja::getAll();

        $this->aspek_kinerja = $aspek_kinerja ? $aspek_kinerja->toArray() : [];
        // dd($this->aspek_kinerja);
        return view('livewire.nilai')->layout('layouts.app');
    }
}
