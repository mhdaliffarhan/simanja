<button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#modalTambahTransaksi({{ $item->id }})">
    <i class="bi bi-plus-lg"></i>
</button>
<div class="modal fade" id="modalTambahTransaksi({{ $item->id }})" tabindex="-1">
    <div class="modal-dialog .modal-dialog-scrollable modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Transaksi {{ $item->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit='tambahTransaksi({{ $item->id }})'>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Penyedia</label>
                        <div class="col-sm-9">
                            <input wire:model="" type="text" class="form-control"
                                value="{{ $data_penyedia['nama'] }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-3 col-form-label">Uraian Pekerjaan <span
                                style="danger">*</span></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" style="height: 50px" wire:model="transaksi.uraian_pekerjaan" required></textarea>
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
                            <input wire:model="transaksi.tahun_anggaran" type="number" class="form-control"
                                min="2000" max="2100">
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class=" text-center text-muted pt-1 fw-bold">Produk</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Harga</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Satuan</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Jumlah</th>
                                <th class=" text-center text-muted pt-1 fw-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_produk as $key => $itemmm)
                                <tr>
                                    <td>{{ $itemmm->produk->nama }}</td>
                                    <td>
                                        <input class="form-control" type="text" value="{{ $itemmm->harga }}"
                                            name="" id="" disabled>
                                    </td>
                                    <td>{{ $itemmm->produk->satuan }}</td>
                                    <td><input wire:model="produk_transaksi.{{ $key }}.jumlah"
                                            class="form-control" type="number" min="0"></td>
                                    <td>{{ $this->getTotal($key) }}</td>



                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <x-primary-button>{{ __('Tambah Transaksi') }}</x-primary-button>
                    </div>
            </form>
        </div>
    </div>
</div><!-- End MODAL TAMBAH Transaksi-->
