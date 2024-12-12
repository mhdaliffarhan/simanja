<section>
  <!-- MODAL TAMBAH PEGAWAI -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
    <i class="bi bi-plus-lg"></i>
    Tambah Data Produk
  </button>
  <div class="modal fade" id="modalTambahProduk" tabindex="-1">\
      <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
          <form wire:submit='tambahProduk'>
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Produk</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input wire:model="tambah_produk.nama" type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Satuan</label>
              <div class="col-sm-10">
                <input wire:model="tambah_produk.satuan" type="text" class="form-control">
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
  </div><!-- End MODAL TAMBAH PEGAWAI-->
</section>