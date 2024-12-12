<?php

namespace App\Livewire;

use App\Models\Satker;
use App\Models\Jabatan;
use App\Models\Golongan;
use App\Models\DataPegawai;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class DetailDataPegawai extends Component
{
    public $pegawai = [
        'nama' => '',
        'jabatan_id' => '',
        'golongan_id' => '',
        'status' => '',
        'pendidikan' => '',
        'angka_kredit' => '',
        'satker_id' => '',
    ];
    public $satker = [];
    public $jabatan = [];
    public $golongan = [];
    public $status = ['PNS', 'PPPK', 'Magang'];

    public $data_pegawai;

    public function mount($id)
    {
        $this->data_pegawai = DataPegawai::findOrFail($id);
        $this->satker = Satker::select('id', 'kode', 'satker')->get();
        $this->jabatan = Jabatan::select('id', 'jabatan')->get();
        $this->golongan = Golongan::select('id', 'jenjang', 'golongan')->get();

        $this->pegawai = [
            'nama' => $this->data_pegawai->nama,
            'jabatan_id' => $this->data_pegawai->jabatan_id,
            'golongan_id' => $this->data_pegawai->golongan_id,
            'status' => $this->data_pegawai->status,
            'pendidikan' => $this->data_pegawai->pendidikan,
            'angka_kredit' => $this->data_pegawai->angka_kredit,
            'satker_id' => $this->data_pegawai->satker_id,
        ];
    }

    public function simpan()
    {
        $this->validate([
            'pegawai.nama' => 'required|string|max:255',
            'pegawai.jabatan_id' => 'required',
            'pegawai.golongan_id' => 'required',
            'pegawai.status' => 'required|string',
            'pegawai.pendidikan' => 'nullable|string',
            'pegawai.angka_kredit' => 'nullable|numeric',
            'pegawai.satker_id' => 'required',
        ]);
        // dd($this->pegawai);
        $this->data_pegawai->update($this->pegawai);
        Alert::success('Berhasil', 'Data Pegawai Berhasil Diperbarui');
    }

    public function render()
    {
        return view('livewire.detail-data-pegawai')->layout('layouts.app');
    }
}
