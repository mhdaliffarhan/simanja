<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\LogNilai;
use App\Models\Transaksi;
use App\Models\AspekKinerja;
use RealRashid\SweetAlert\Facades\Alert;

class Nilai extends Component
{
    public $aspek_kinerja;
    public $transaksi;
    public $selectedValues = [
        "1" => 0,
        "2" => 0,
        "3" => 0,
        "4" => 0,
    ];
    public $nilai, $predikat;
    public $nilai_akhir;

    public function updated()
    {
        $this->hitungNilai();
    }

    public function hitungNilai()
    {
        $this->nilai_akhir = 0;
        foreach ($this->aspek_kinerja as $key => $aspek) {
            $this->nilai_akhir = $this->nilai_akhir + ($this->selectedValues[$key + 1] * $aspek->bobot / 100);
        }
        $this->predikat = $this->tentukanPredikat($this->nilai_akhir);
    }

    private function tentukanPredikat($nilai)
    {
        if ($nilai == 3) return 'Sangat Baik';
        if ($nilai >= 2) return 'Baik';
        if ($nilai >= 1) return 'Cukup';
        return 'Buruk';
    }

    public function mount($id)
    {
        $this->transaksi = Transaksi::where('id', $id)->with('penyedia')->first();
        $this->aspek_kinerja = AspekKinerja::getAll();
    }

    public function save()
    {
        try {
            $this->transaksi['predikat'] = $this->predikat;
            $validatedData = $this->validate([
                'selectedValues.*' => 'required|in:1,2,3',
            ], [
                'selectedValues.*.in' => 'Setiap soal harus memiliki satu pilihan.',
            ]);
            foreach ($this->selectedValues as $key => $value) {
                LogNilai::create([
                    'transaksi_id' => $this->transaksi->id,
                    'aspek_kinerja_id' => $key,
                    'nilai_kinerja' => $value,
                ]);
            }
            
            $this->transaksi->nilai = $this->nilai_akhir;
            $transaksi = $this->transaksi->toArray();
            $this->transaksi->update($transaksi);

            Alert::success('Berhasil', 'Berhasil menilai transaksi!');
            return redirect()->route('transaksi');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('nilai', ['id' => $this->transaksi->id]);
        }
    }
    public function render()
    {
        return view('livewire.nilai')->layout('layouts.app');
    }
}
