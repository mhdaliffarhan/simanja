<?php

namespace App\Livewire;

use App\Models\Satker;
use App\Models\Jabatan;
use Livewire\Component;
use App\Models\Golongan;
use App\Models\DataPegawai;
use RealRashid\SweetAlert\Facades\Alert;

class DatabasePegawai extends Component
{
    public $satker = [];
    public $jabatan = [];
    public $golongan = [];
    public $status = [
        'PNS',
        'PPPK',
        'Magang'
    ];

    public $data_pegawai;
    public $pilih_satker;

    public $tambah_pegawai = [
        'nama' => '',
        'jabatan_id' => '',
        'golongan_id' => '',
        'status' => '',
        'pendidikan' => '',
        'angka_kredit' => '',
        'satker_id' => '',
    ];

    public $pegawai = [
        'nama' => '',
        'jabatan_id' => '',
        'golongan_id' => '',
        'status' => '',
        'pendidikan' => '',
        'angka_kredit' => '',
        'satker_id' => '',
    ];

    public function mount()
    {

        $this->satker = Satker::select('id', 'kode', 'satker')->get();
        $this->jabatan = Jabatan::select('id', 'jabatan')->get();
        $this->golongan = Golongan::select('id', 'jenjang', 'golongan')->get();
        $this->data_pegawai = DataPegawai::with('jabatan', 'golongan', 'satker')
            ->select('id', 'nama', 'jabatan_id', 'golongan_id', 'status', 'pendidikan', 'angka_kredit', 'satker_id')
            ->get();
        // dd($this->tambah_pegawai);
    }

    public function testing()
    {
        dd('terpanggil');
    }

    public function tambahPegawai(): void
    {
        // Validasi data input
        $validatedData = $this->validate([
            'tambah_pegawai.nama' => 'required|string|max:255',
            'tambah_pegawai.jabatan_id' => 'required|numeric|min:1',
            'tambah_pegawai.golongan_id' => 'required|numeric|min:1',
            'tambah_pegawai.status' => 'required',
            'tambah_pegawai.pendidikan' => 'required|string|max:255',
            'tambah_pegawai.angka_kredit' => 'required|numeric|min:0',
            'tambah_pegawai.satker_id' => 'required|numeric|min:1',
        ]);

        // Ambil data dari nested array tambah_pegawai
        $pegawaiData = $validatedData['tambah_pegawai'];

        // Lakukan penyimpanan data
        DataPegawai::create($pegawaiData);

        // Reset data form dan tampilkan notifikasi
        $this->reset('tambah_pegawai');
        Alert::success('Berhasil', 'Data Pegawai Berhasil Ditambahkan.');

        // Redirect atau refresh komponen
        $this->redirect(route('database-pegawai'));
    }

    public function filterTable(): void
    {
        // dd($this->pilih_satker);
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

    public function deletePegawai($id)
    {
        $data = DataPegawai::findOrFail($id);

        // Hapus data pegawai
        $data->delete();


        return redirect()->back();
    }


    public function render()
    {
        return view('livewire.database-pegawai')->layout('layouts.app');
    }
}
