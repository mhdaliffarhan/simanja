<x-slot name="breadcrumb"><div class="row pagetitle">
    <h1>Input Angka Kredit</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Input Angka Kredit</li>
      </ol>
    </nav>
  </div>
</x-slot>

<section>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <h5 class="card-title">Input Angka Kredit</h5>
              </div>
              
            </div>
            <form wire:submit="filterTable" >
              <div class="row mb-3">
                <label class="col-4 col-md-2 col-sm-6 col-form-label">Satuan Kerja</label>
                <div class="col-8 col-md-4 col-sm-6">
                  <select wire:model="pilih_satker" class="form-select" aria-label="Default select example">
                    <option value="{{null}}" selected>Pilih Satker...</option>
                    @foreach ($satker as $item)
                        <option value="{{ $item->id }}">{{ $item->satker}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-12 col-sm-12 col-md-2">
                  <x-primary-button>{{ __('Pilih Satker') }}</x-primary-button>
                </div>
              </div>
            </form>
            <form wire:submit="inputAngkaKredit">
              <table class="table">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Golongan</th>
                    <th class="text-center">Angka Kredit</th>
                    <th class="text-center">Target</th>
                    <th class="text-center">Tambah Angka Kredit</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($data_pegawai as $index => $item)
                    <tr class="text-center align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td class="text-start">{{$item->nama}}</td>
                        <td>{{$item->golongan->golongan}}</td>
                        <td>{{$item->angka_kredit}}</td>
                        <td>{{$item->golongan->target_angka_kredit}}</td>
                        <td> <input wire:model="tambah_angka_kredit.{{ $item->id }}" type="number" step="0.001" min="0"></td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
            <div class="row">
              <div class="col-12 col-md-12">
                <x-action-message class="me-3 mb-3" on="input-angka-kredit">
                    {{ __('Angka Kredit berhasil di Input!.') }}
                </x-action-message>
              </div>
              <div class="col-12 text-end">
                <button class="btn btn-primary">Input Angka Kredit</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          new simpleDatatables.DataTable(".datatable");
      });
    </script>
  </section>