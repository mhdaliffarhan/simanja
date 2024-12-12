<section>
  <!-- MODAL TAMBAH PEGAWAI -->
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPegawai">
    <i class="bi bi-plus-lg"></i>
    Tambah Data Pegawai
  </button>
  <div class="modal fade" id="modalTambahPegawai" tabindex="-1">\
    <form wire:submit='tambahPegawai'>
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Pegawai</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Satker</label>
              <div class="col-sm-10">
                <select wire:model="tambah_pegawai.satker_id" class="form-select" aria-label="Default select example">
                  <option value="{{ null }}" selected>Pilih satker</option>
                  @foreach ($satker as $item)
                    <option value="{{ $item->id }}">({{$item->kode}})  {{$item->satker}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input wire:model="tambah_pegawai.nama" type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jabatan</label>
              <div class="col-sm-10">
                <select wire:model="tambah_pegawai.jabatan_id" class="form-select" aria-label="Default select example">
                  <option value="{{null}}" selected>Pilih jabatan</option>
                  @foreach ($jabatan as $item)
                    <option value="{{$item->id}}">{{$item->jabatan}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Gol. Akhir</label>
              <div class="col-sm-10">
                <select wire:model="tambah_pegawai.golongan_id" class="form-select" aria-label="Default select example">
                  <option selected>Pilih Golongan Terkahir</option>
                  @foreach ($golongan as $item)
                    <option value="{{$item->id}}">{{$item->golongan}} ({{$item->jenjang}}) </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <select wire:model="tambah_pegawai.status" class="form-select" aria-label="Default select example">
                  <option value="{{null}}" selected>Pilih status</option>
                  @foreach ($status as $item)
                    <option value="{{$item}}">{{$item}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Pendidikan</label>
              <div class="col-sm-10">
                <input wire:model="tambah_pegawai.pendidikan" type="text" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Angka Kredit Terakhir</label>
              <div class="col-sm-10">
                <input wire:model="tambah_pegawai.angka_kredit" type="number" class="form-control" step="0.001" min="0">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            {{-- <button type="submit" class="btn btn-primary">Tambah Pegawai</button> --}}
            <x-primary-button>{{ __('Tambah Pegawai') }}</x-primary-button>
          </div>
        </div>
      </div>
    </form>  
  </div><!-- End MODAL TAMBAH PEGAWAI-->
</section>