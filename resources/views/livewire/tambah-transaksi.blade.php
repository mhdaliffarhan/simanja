<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Tambah Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('transaksi') }}">Transaksi</a></li>
                <li class="breadcrumb-item active">Tambah Transaksi</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section class="section dashboard">
    <div class="row">
        @if ($formStep == 1)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="row">

                        </div> --}}
                        <h5 class="card-title">Penyedia</h5>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_transaksi.tanggal" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Penyedia</label>
                            <div class="col-sm-10">
                                <select wire:model="tambah_transaksi.penyedia_id" class="form-select"
                                    aria-label="Default select example">
                                    <option value="{{ null }}" selected>Pilih penyedia</option>
                                    @foreach ($daftar_penyedia as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-md-end mb-3">
                            <div class="col-12 col-md-10">
                                <button wire:click="nextStep" class="btn btn-primary w-100">Selanjutnya</button>
                            </div>
                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        @endif
        @if ($formStep == 2)
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <form wire:submit='tambahTransaksi'> --}}

                        <h5 class="card-title">Produk</h5>

                        <!-- MENAMPILKAN SEMUA PRODUK YANG DIMILIKI OLEH PENYEDIA -->
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class=" text-center text-muted pt-1 fw-bold">Produk</th>
                                            <th class=" text-center text-muted pt-1 fw-bold">Harga</th>
                                            <th class=" text-center text-muted pt-1 fw-bold">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_produk as $key => $item)
                                            <tr>
                                                <td class="text-center">{{ $item->produk->nama }}</td>
                                                <td class="text-center">
                                                    <div class="row">
                                                        {{ $item->harga }}
                                                        /{{ $item->produk->satuan }}
                                                        {{-- <input class="form-control" type="text"
                                                        value="{{ $item->harga }}" name="" id=""
                                                        disabled> --}}
                                                </td>
                                                {{-- <td>{{ $item->produk->satuan }}</td> --}}
                                                <td><input wire:model="produk_transaksi.{{ $key }}.jumlah"
                                                        class="form-control" type="number" min="0"></td>
                                                <td>{{ $produk_transaksi[$key]['jumlah'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-auto me-auto">
                                <button wire:click="backStep" class="btn btn-primary">Kembali</button>
                            </div>
                            <div class="col-auto mt-3 mb-3">
                                <button wire:click="tambahTransaksi" class="btn btn-primary">Tambah Transaksi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</section>
