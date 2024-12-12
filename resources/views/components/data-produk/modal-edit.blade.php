<a href="/detail-data-produk/{{$item->id}}" class="btn btn-success">
  <i class="bi bi-pencil"></i>
   Edit
</a>
  
  
  <!-- MODAL Edit PRODUK -->
  {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalEditProduk{{$item->id}}">
    <i class="bi bi-pencil"></i>
    Edit
  </button>
  <div class="modal fade" id="modalEditProduk{{$item->id}}" tabindex="-1">\
    
      <div class="modal-dialog modal-dialog-centered">
        
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data Produk {{$item->id}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="editProduk({{ $item->id }}, $refs.nama.value, $refs.satuan.value)">
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputNama" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input id="inputNama" type="text" class="form-control" placeholder="{{ $item->nama }}" x-ref="nama">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputSatuan" class="col-sm-2 col-form-label">Satuan</label>
                    <div class="col-sm-10">
                        <input id="inputSatuan" type="text" class="form-control" value="{{$item->satuan}}" x-ref="satuan">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
        </div>
      </div>
  </div><!-- End MODAL Edit PEGAWAI--> --}}