<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Detail Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('transaksi') }}">Transaksi</a></li>
                <li class="breadcrumb-item active">Detail Transaksi</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Transaksi</h5>
            <form wire:submit.prevent="simpanTransaksi">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Penyedia</label>
                        <div class="col-sm-9">
                            <input wire:model="" type="text" class="form-control"
                                value="{{ $data_penyedia['nama'] }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                        <div class="col-sm-9">
                            <input wire:model="transaksi.tanggal" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Tahun Anggaran</label>
                        <div class="col-sm-9">
                            <input wire:model="transaksi.tahun_anggaran" type="number" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Nama Paket Pengadaan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" style="height: 50px" wire:model="transaksi.keterangan"></textarea>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center text-muted pt-1 fw-bold">No</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Produk</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Harga</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Satuan</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Jumlah</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_produk as $key => $itemmm)
                                <tr class="text-center">
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $itemmm->produk->nama }}</td>
                                    <td>
                                        <input class="form-control" type="text" value="{{ $itemmm->harga }}"
                                            name="" id="" disabled>
                                    </td>
                                    <td>{{ $itemmm->produk->satuan }}</td>
                                    <td><input wire:model="produk_transaksi.{{ $key }}.jumlah"
                                            class="form-control" type="number" min="0" value="0" required>
                                    </td>
                                    <td>
                                        {{-- saya ingin disini menampilkan hasil dari jumlah dan harga --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <x-primary-button>{{ __('Ganti') }}</x-primary-button>
                    </div>
                </div>
        </div>
</section>
