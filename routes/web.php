<?php

use App\Livewire\Nilai;
use App\Livewire\Dashboard;
use App\Livewire\DaftarAdmin;
use App\Livewire\AspekKinerja;
use App\Livewire\DatabaseProduk;
use App\Livewire\DetailTransaksi;
use App\Livewire\TambahTransaksi;
use App\Livewire\DatabasePenyedia;
use App\Livewire\TambahPenyedia;
use App\Livewire\DetailDataProduk;
use App\Livewire\DatabaseTransaksi;
use App\Livewire\DetailDataPenyedia;
use Illuminate\Support\Facades\Route;
use App\Livewire\DetailDataProdukPenyedia;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::view('/profile', 'profile')->name('profile');

    // Menu Produk
    Route::get('/database-produk', DatabaseProduk::class)->name('database-produk');
    Route::get('/detail-data-produk/{id}', DetailDataProduk::class)->name('detail-data-produk');

    // Menu Penyedia
    Route::get('/database-penyedia', DatabasePenyedia::class)->name('database-penyedia');
    Route::get('/tambah-penyedia', TambahPenyedia::class)->name('tambah-penyedia');
    Route::get('/detail-data-penyedia/{id}', DetailDataPenyedia::class)->name('detail-data-penyedia');
    Route::get('/detail-data-produk-penyedia/{id}', DetailDataProdukPenyedia::class)->name('detail-data-produk-penyedia');

    // Menu Transaksi
    Route::get('/transaksi', DatabaseTransaksi::class)->name('transaksi');
    Route::get('/tambah-transaksi', TambahTransaksi::class)->name('tambah-transaksi');
    Route::get('/detail-transaksi/{id}', DetailTransaksi::class)->name('detail-transaksi');

    Route::get('/nilai/{id}', Nilai::class)->name('nilai');

    // Menu Admin
    Route::get('/daftar-pengentri', DaftarAdmin::class)->name('daftar-admin');
    Route::get('/aspek-kinerja', AspekKinerja::class)->name('aspek-kinerja');
});


require __DIR__ . '/auth.php';
