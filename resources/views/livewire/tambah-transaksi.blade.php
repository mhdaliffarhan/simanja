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
    <div class="row" wire:poll.1s>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form wire:submit.prevent="tambahTransaksi">
                        <h5 class="card-title">Penyedia</h5>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Penyedia</label>
                            <div class="col-sm-10">
                                <select wire:model="transaksi.penyedia_id" class="form-select"
                                    aria-label="Default select example">
                                    <option value="{{ null }}" selected>Pilih penyedia</option>
                                    @foreach ($daftar_penyedia as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Uraian Pekerjaan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 50px" wire:model="transaksi.uraian_pekerjaan" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-10">
                                <input wire:model="transaksi.tanggal" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun Anggaran</label>
                            <div class="col-sm-10">
                                <input wire:model="transaksi.tahun_anggaran" type="number" class="form-control"
                                    min="2000" max="2100">
                            </div>
                        </div>
                        <h5 class="card-title">Produk</h5>
                        <div class="row">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class=" text-center text-muted pt-1 fw-bold">No</th>
                                            <th class=" text-center text-muted pt-1 fw-bold">Produk</th>
                                            <th class=" text-center text-muted pt-1 fw-bold">Harga</th>
                                            <th class=" text-center text-muted pt-1 fw-bold">Jumlah</th>
                                            <th class=" text-center text-muted pt-1 fw-bold">Total</th>
                                            <th class=" text-center text-muted pt-1 fw-bold">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($daftar_produk_transaksi as $key => $produk)
                                            <tr class="text-center align-middle">
                                                <td >{{ $key + 1 }}</td>
                                                <td>
                                                    <select wire:model="daftar_produk_transaksi.{{$key}}.produk_id" class="form-select" >
                                                        <option value="{{ null }}" selected>Pilih produk</option>
                                                        @foreach ($daftar_produk_penyedia as $itemm)
                                                            <option value="{{ $itemm->produk->id }}">{{ $itemm->produk->nama}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="row mx-4">
                                                        <div class="input-group">
                                                            <input class="form-control" wire:model="daftar_produk_transaksi.{{$key}}.harga" type="number" required>
                                                            <span class="input-group-text" id="basic-addon2">/{{ $daftar_produk_transaksi[$key]['satuan']}}</span>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input class="form-control" wire:model="daftar_produk_transaksi.{{$key}}.jumlah" type="number"
                                                        name="" id="" required>
                                                </td>
                                                <td>
                                                    {{ $daftar_produk_transaksi[$key]['total'] }}
                                                </td>
                                                <td>
                                                    <button class="btn btn-outline-danger" wire:click="hapusProdukTransaksi({{ $key }})"><i class="bi bi-trash"></i> Hapus</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                            <tr class="text-center align-middle">
                                                <td></td>
                                                <td colspan="3">
                                                    <button class="btn btn-outline-primary w-100" wire:click="tambahProdukTransaksi"><i class="bi bi-plus-lg"></i>Tambah Produk</button>
                                                </td>
                                                <td  class="text-muted pt-1 fw-bold">{{ $total_kontrak }}</td>
                                                <td>
                                                    <button class="btn btn-success w-100" type="submit">Submit</button>
                                                </td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

</section>
