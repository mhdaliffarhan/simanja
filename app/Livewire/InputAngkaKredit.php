<?php

namespace App\Livewire;

use App\Models\Satker;
use Livewire\Component;
use App\Models\DataPegawai;

class InputAngkaKredit extends Component
{
    public $satker = [];
    public $data_pegawai = [];
    public $pilih_satker;
    public $tambah_angka_kredit = [];

    public function mount()
    {
        $this->satker = Satker::select('id', 'kode', 'satker')->get();
        $this->data_pegawai = DataPegawai::with('jabatan', 'golongan', 'satker')
            ->select('id', 'nama', 'jabatan_id', 'golongan_id', 'status', 'pendidikan', 'angka_kredit', 'satker_id')
            ->get();
        // dd($this->data_pegawai);
    }

    public function filterTable(): void
    {
        // Memfilter data pegawai berdasarkan satuan kerja yang dipilih
        if ($this->pilih_satker) {
            $this->data_pegawai = DataPegawai::where('satker_id', $this->pilih_satker)
                ->with('jabatan', 'satker')
                ->select('id', 'nama', 'jabatan_id', 'golongan_id', 'status', 'pendidikan', 'angka_kredit', 'satker_id')
                ->get();
        } else {
            // Jika tidak ada satker yang dipilih, ambil semua data pegawai
            $this->data_pegawai = DataPegawai::with('jabatan', 'satker')
                ->select('id', 'nama', 'jabatan_id', 'golongan_id', 'status', 'pendidikan', 'angka_kredit', 'satker_id')
                ->get();
        }
        toast('Success Toast', 'success');
    }

    public function inputAngkaKredit()
    {

        foreach ($this->tambah_angka_kredit as $id_pegawai => $angka_tambahan) {
            $pegawai = DataPegawai::find($id_pegawai);
            if ($pegawai && is_numeric($angka_tambahan)) {
                // Menambahkan angka kredit ke pegawai yang sesuai
                $pegawai->angka_kredit += $angka_tambahan;
                $pegawai->save();
            }
        }
        $this->dispatch('input-angka-kredit');
    }

    public function render()
    {
        return view('livewire.input-angka-kredit')->layout('layouts.app');
    }
}
