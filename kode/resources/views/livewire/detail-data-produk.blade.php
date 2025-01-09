<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Detail Data produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('database-produk') }}">Database Produk</a></li>
                <li class="breadcrumb-item active">Detail Produk</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Produk</h5>
            <form wire:submit.prevent="simpan">
                <x-action-message class="me-3" on="edit-produk">
                    {{ __('Data berhasil diperbarui!') }}
                </x-action-message>
                <div class="row mb-3">
                    <div class="col-12 col-md-12">
                        <x-action-message class="me-3" on="password-updated">
                            {{ __('Password berhasil diperbarui!') }}
                        </x-action-message>
                        <x-input-error :messages="$errors->get('general')" class="" />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Kode</label>
                    <div class="col-sm-10">
                        <input wire:model="data_produk.kode" type="text" class="form-control"
                            value="{{ $produk->kode }}" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input wire:model="data_produk.nama" type="text" class="form-control"
                            value="{{ $produk->nama }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input wire:model="data_produk.satuan" type="text" class="form-control"
                            value="{{ $produk->satuan }}">
                    </div>
                </div>
                <div class="row justify-content-md-end">
                    <div class="col-12 col-md-10">
                        <button type="submit" class="btn btn-primary">Ganti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
