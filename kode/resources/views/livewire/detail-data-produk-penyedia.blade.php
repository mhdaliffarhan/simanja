<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Detail Produk Penyedia</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('database-penyedia') }}">Database Penyedia</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('detail-data-penyedia', ['id' => $this->produk_penyedia['penyedia_id']]) }}">Detail
                        Penyedia</a></li>
                <li class="breadcrumb-item active">Detail Produk Penyedia</li>
            </ol>
        </nav>
    </div>
</x-slot>
<section class="section dashboard">
    <div class="card">
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title">Data Produk Penyedia</h5>
                <form wire:submit="simpan({{ $produk_penyedia['id'] }})">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input wire:model="produk_penyedia.produk.kode" type="text" class="form-control"
                                value="{{ $produk_penyedia['produk']['kode'] }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input wire:model="produk_penyedia.produk.nama" type="text" class="form-control"
                                value="{{ $produk_penyedia['produk']['nama'] }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                            <input wire:model="produk_penyedia.produk.satuan" type="text" class="form-control"
                                value="{{ $produk_penyedia['produk']['satuan'] }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input wire:model="produk_penyedia.harga" type="number" class="form-control"
                                value="{{ $produk_penyedia['harga'] }}" min="0">
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
    </div>
</section>
