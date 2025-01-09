<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class DaftarAdmin extends Component
{
    public $user;
    public $tambah_admin = [
        'username' => '',
        'password' => 'password',
        'role' => 'pengentri',
    ];

    public function mount()
    {
        $this->user = User::where('role', 'pengentri')
            ->select('id', 'username', 'role')
            ->get();
    }

    public function tambahAdmin()
    {
        try {
            // Validasi data input
            $validatedData = $this->validate([
                'tambah_admin.username' => 'required|string|max:255|unique:users,username',
                'tambah_admin.password' => 'required|string|min:8',
                'tambah_admin.role' => 'required',
            ], [
                'tambah_admin.username.required' => 'Username wajib diisi.',
                'tambah_admin.password.required' => 'Password wajib diisi.',
                'tambah_admin.role.required' => 'Role wajib dipilih.',
            ]);

            // Simpan data admin ke dalam model
            User::create([
                'username' => $validatedData['tambah_admin']['username'],
                'password' => bcrypt($validatedData['tambah_admin']['password']),
                'role' => $validatedData['tambah_admin']['role'],
            ]);

            // Reset input setelah berhasil
            $this->reset('tambah_admin');

            // Tampilkan pesan sukses
            Alert::success('Berhasil', 'Pengentri berhasil ditambahkan.');
            return redirect()->route('daftar-admin');
        } catch (\Throwable $th) {
            // Tangkap error dan tampilkan pesan gagal
            Alert::error('Gagal', $th->getMessage());
            return redirect()->route('daftar-admin');
        }
    }


    public function deleteAdmin($id)
    {
        $user = User::findOrFail($id);

        // Hapus data pegawai
        $user->delete();

        Alert::success('Berhasil', 'Berhasil menghapus pengentri');

        $this->redirect(route('daftar-admin'));
    }

    public function render()
    {
        return view('livewire.daftar-admin')->layout('layouts.app');
    }
}
