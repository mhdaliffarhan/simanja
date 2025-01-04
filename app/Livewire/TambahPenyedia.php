<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Penyedia;
use RealRashid\SweetAlert\Facades\Alert;

class TambahPenyedia extends Component
{
    public $opsi_produk = [];
    public $tambah_penyedia = [
        'nama' => '',
        'status' => '',
        'alamat' => '',
        'tahun_berdiri' => '',
        'nohp' => '',
        'email' => '',
        'jenis_usaha' => '',
        'no_identitas' => '',
        'pengurus' => '',
        'jabatan' => '',
        'no_akta' => '',
        'tanggal' => '',
        'notaris' => '',
        'no_tgl' => '',
        'masa_berlaku' => '',
        'instansi_pemberi' => '',
        'npwp' => '',
        'nama_narahubung' => '',
        'nohp_narahubung' => '',
        'jabatan_narahubung' => '',
    ];

    public function tambahPenyedia()
    {
        try {
            $validatedData = $this->validate([
                'tambah_penyedia.nama' => 'required|string|max:255',
                'tambah_penyedia.status' => 'required|string|max:100',
                'tambah_penyedia.alamat' => 'required|string|max:500',
                'tambah_penyedia.tahun_berdiri' => 'nullable|integer|min:1900|max:2200',
                'tambah_penyedia.nohp' => 'nullable|string|max:15',
                'tambah_penyedia.no_identitas' => 'nullable|string|max:50',
                'tambah_penyedia.email' => 'nullable|email|max:255',
                'tambah_penyedia.jenis_usaha' => 'nullable|string|max:100',
                'tambah_penyedia.pengurus' => 'nullable|string|max:255',
                'tambah_penyedia.jabatan' => 'nullable|string|max:100',
                'tambah_penyedia.no_akta' => 'nullable|string|max:50',
                'tambah_penyedia.tanggal' => 'nullable|date',
                'tambah_penyedia.notaris' => 'nullable|string|max:255',
                'tambah_penyedia.no_tgl' => 'nullable|string|max:50',
                'tambah_penyedia.masa_berlaku' => 'nullable|string|max:255',
                'tambah_penyedia.instansi_pemberi' => 'nullable|string|max:255',
                'tambah_penyedia.npwp' => 'nullable|string|max:20',
                'tambah_penyedia.nama_narahubung' => 'required|string|max:255',
                'tambah_penyedia.nohp_narahubung' => 'required|string|max:255',
                'tambah_penyedia.jabatan_narahubung' => 'required|string|max:255',
            ], [
                'tambah_penyedia.nama.required' => 'Nama penyedia wajib diisi.',
                'tambah_penyedia.nama.max' => 'Nama penyedia maksimal 255 karakter.',
                'tambah_penyedia.status.required' => 'Status penyedia wajib diisi.',
                'tambah_penyedia.status.max' => 'Status penyedia maksimal 100 karakter.',
                'tambah_penyedia.alamat.required' => 'Alamat penyedia wajib diisi.',
                'tambah_penyedia.alamat.max' => 'Alamat penyedia maksimal 500 karakter.',
                'tambah_penyedia.tahun_berdiri.required' => 'Tahun berdiri penyedia wajib diisi.',
                'tambah_penyedia.tahun_berdiri.integer' => 'Tahun berdiri penyedia harus berupa angka.',
                'tambah_penyedia.tahun_berdiri.min' => 'Tahun berdiri penyedia minimal 1900.',
                'tambah_penyedia.tahun_berdiri.max' => 'Tahun berdiri penyedia maksimal ' . date('Y'),
                'tambah_penyedia.nohp.required' => 'No. HP penyedia wajib diisi.',
                'tambah_penyedia.nohp.max' => 'No. HP penyedia maksimal 15 karakter.',
                'tambah_penyedia.email.required' => 'Email penyedia wajib diisi.',
                'tambah_penyedia.email.email' => 'Email penyedia harus berupa alamat email.',
                'tambah_penyedia.jenis_usaha.required' => 'Jenis usaha penyedia wajib diisi.',
                'tambah_penyedia.jenis_usaha.max' => 'Jenis usaha penyedia maksimal 100 karakter.',
                'tambah_penyedia.no_identitas.required' => 'No. identitas penyedia wajib diisi.',
                'tambah_penyedia.no_identitas.max' => 'No. identitas penyedia maksimal 50 karakter.',
                'tambah_penyedia.pengurus.required' => 'Pengurus penyedia wajib diisi.',
                'tambah_penyedia.pengurus.max' => 'Pengurus penyedia maksimal 255 karakter.',
                'tambah_penyedia.jabatan.required' => 'Jabatan penyedia wajib diisi.',
                'tambah_penyedia.jabatan.max' => 'Jabatan penyedia maksimal 100 karakter.',
                'tambah_penyedia.no_akta.required' => 'No. akta penyedia wajib diisi.',
                'tambah_penyedia.no_akta.max' => 'No. akta penyedia maksimal 50 karakter.',
                'tambah_penyedia.notaris.required' => 'Notaris penyedia wajib diisi.',
                'tambah_penyedia.notaris.max' => 'Notaris penyedia maksimal 255 karakter.',
                'tambah_penyedia.no_tgl.required' => 'No. Tgl penyedia wajib diisi.',
                'tambah_penyedia.no_tgl.max' => 'No. Tgl penyedia maksimal 50 karakter.',
                'tambah_penyedia.masa_berlaku.required' => 'Masa berlaku penyedia wajib diisi.',
                'tambah_penyedia.masa_berlaku.max' => 'Masa berlaku penyedia maksimal 255 karakter.',
                'tambah_penyedia.instansi_pemberi.required' => 'Instansi pemberi penyedia wajib diisi.',
                'tambah_penyedia.instansi_pemberi.max' => 'Instansi pemberi penyedia maksimal 255 karakter.',
                'tambah_penyedia.npwp.required' => 'NPWP penyedia wajib diisi.',
                'tambah_penyedia.npwp.max' => 'NPWP penyedia maksimal 20 karakter.',
                'tambah_penyedia.nama_narahubung.required' => 'Nama narahubung penyedia wajib diisi.',
                'tambah_penyedia.nama_narahubung.max' => 'Nama narahubung penyedia maksimal 255 karakter.',
                'tambah_penyedia.nohp_narahubung.required' => 'No. HP narahubung penyedia wajib diisi.',
                'tambah_penyedia.nohp_narahubung.max' => 'No. HP narahubung penyedia maksimal 255 karakter.',
                'tambah_penyedia.jabatan_narahubung.required' => 'Jabatan narahubung penyedia wajib diisi.',
                'tambah_penyedia.jabatan_narahubung.max' => 'Jabatan narahubung penyedia maksimal 255 karakter.',


            ]);
            $dataPenyedia = $validatedData['tambah_penyedia'];
            $dataPenyedia['tanggal'] = $dataPenyedia['tanggal'] ?: null;
            $dataPenyedia['masa_berlaku'] = $dataPenyedia['masa_berlaku'] ?: null;

            Penyedia::create($dataPenyedia);
            $this->reset('tambah_penyedia');
            Alert::success('Berhasil', 'Penyedia baru berhasil ditambahkan!');
            return redirect()->route('database-penyedia');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Alert::error('Gagal', 'Validasi gagal!');
            return redirect()->route('database-penyedia');
        } catch (\Exception $e) {
            Alert::error('Gagal', $e->getMessage());
            return redirect()->route('database-penyedia');
        }
    }

    public function render()
    {
        return view('livewire.tambah-penyedia')->layout('layouts.app');
    }
}
