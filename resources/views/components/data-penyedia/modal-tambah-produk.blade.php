<!-- MODAL TAMBAH PRODUK -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
    data-bs-target="#modalTambahProduk({{ $item->id }})">
    <i class="bi bi-plus-lg"></i>
</button>
<div class="modal fade" id="modalTambahProduk({{ $item->id }})" tabindex="-1">
    <div class="modal-dialog .modal-dialog-scrollable modal-dialog-centered modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Produk {{ $item->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit='tambahProduk({{ $item->id }})'>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Produk</label>
                        <div class="col-sm-10">
                            <select wire:model="tambah_produk.produk_id" class="form-select"
                                aria-label="Default select example">
                                <option value="{{ null }}" selected>Pilih Produk</option>
                                @foreach ($opsi_produk as $item)
                                    <option value="{{ $item->id }}">({{ $item->kode }})
                                        {{ $item->nama }}
                                        ({{ $item->satuan }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input wire:model="tambah_produk.harga" type="number" min="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <x-primary-button>{{ __('Tambah Produk') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div><!-- End MODAL TAMBAH PRODUK-->
