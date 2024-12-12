<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Component;
use App\Models\Penyedia;
use App\Models\ProdukPenyedia;
use App\Exports\PenyediaExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DatabasePenyedia extends Component
{
    public $data_penyedia = [];
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

    public $tambah_produk = [
        'penyedia_id' => '',
        'produk_id' => '',
        'harga' => '',
    ];

    public function mount()
    {
        $this->data_penyedia = Penyedia::with('transaksi')->get();

        foreach ($this->data_penyedia as $penyedia) {
            $rerata = $penyedia->transaksi->avg('nilai');
            $penyedia->rerata_nilai = round($rerata, 1) ?: null;
        }

        $this->opsi_produk = Produk::getAll();
    }

    public function export()
    {
        try {
            return Excel::download(new PenyediaExport, 'peneydia.xlsx', \Maatwebsite\Excel\Excel::XLSX);
            Alert::success('Berhasil', 'Berhasil Menambah Penyedia');
            return redirect()->route('database-penyedia');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('database-penyedia');
        }
    }

    public function tambahPenyedia()
    {
        try {
            $validatedData = $this->validate([
                'tambah_penyedia.nama' => 'required|string|max:255',
                'tambah_penyedia.status' => 'required|string|max:100',
                'tambah_penyedia.alamat' => 'required|string|max:500',
                'tambah_penyedia.tahun_berdiri' => 'nullable|integer|min:1900|max:2200',
                'tambah_penyedia.nohp' => 'nullable|string|max:15',
                'tambah_penyedia.email' => 'nullable|email|max:255',
                'tambah_penyedia.jenis_usaha' => 'required|string|max:100',
                'tambah_penyedia.no_identitas' => 'nullable|string|max:50',
                'tambah_penyedia.pengurus' => 'required|string|max:255',
                'tambah_penyedia.jabatan' => 'required|string|max:100',
                'tambah_penyedia.no_akta' => 'required|string|max:50',
                'tambah_penyedia.tanggal' => 'required|date',
                'tambah_penyedia.notaris' => 'required|string|max:255',
                'tambah_penyedia.no_tgl' => 'required|string|max:50',
                'tambah_penyedia.masa_berlaku' => 'nullable|string|max:255',
                'tambah_penyedia.instansi_pemberi' => 'nullable|string|max:255',
                'tambah_penyedia.npwp' => 'required|string|max:20',
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

    public function deletePenyedia($id)
    {
        $data = Penyedia::findOrFail($id);

        // Hapus data pegawai
        $data->delete();

        return redirect(route('database-penyedia'));
    }

    public function tambahProduk($id)
    {
        $validatedData = $this->validate([
            'tambah_produk.harga' => 'required',
        ]);

        $this->tambah_produk['penyedia_id'] = "{$id}";

        ProdukPenyedia::create($this->tambah_produk);

        // Mengosongkan input setelah penyimpanan berhasil
        $this->reset('tambah_produk');

        // Mengirimkan notifikasi keberhasilan
        Alert::success('Berhasil', 'Produk baru berhasil ditambahkan!');

        $this->redirect(route('database-penyedia'));
    }

    public function render()
    {
        return view('livewire.database-penyedia')->layout('layouts.app');
    }
}
