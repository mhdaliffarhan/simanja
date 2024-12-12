<section>
    <div class="row">
        <div class="col-auto me-auto">
            <h5 class="card-title">Daftar Admin</h5>
        </div>
        <div class="col-auto mt-3 mb-3">
            @include('components.data-pegawai.add-data-pegawai')
        </div>
        <form wire:submit="filterTable">
            <div class="row">
                <label class="col-4 col-md-2 col-sm-6 col-form-label">Satuan Kerja</label>
                <div class="col-8 col-md-4 col-sm-6">
                    <select wire:model="pilih_satker" class="form-select" aria-label="Default select example">
                        <option value="{{ null }}" selected>Pilih Satker...</option>
                        @foreach ($satker as $item)
                            <option value="{{ $item->id }}">{{ $item->satker }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-12 col-md-2">
                    <x-primary-button>{{ __('Pilih Satker') }}</x-primary-button>
                </div>
            </div>
        </form>
        <table class="table datatable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Gol. Akhir</th>
                    <th class="text-center">Angka Kredit</th>
                    <th class="text-center">Satuan Kerja</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_pegawai as $index => $item)
                    <tr class="text-center align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td class="text-start">{{ $item->nama }}</td>
                        <td>{{ $item->jabatan->jabatan }}</td>
                        <td>{{ $item->golongan->golongan }}</td>
                        <td>{{ $item->angka_kredit }}</td>
                        <td>{{ $item->satker->satker }}</td>
                        <td>
                            <!-- INCLUDE -->
                            @include('components.data-pegawai.modal-edit')
                            @include('components.data-pegawai.modal-delete')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new simpleDatatables.DataTable(".datatable");
        });
    </script>
</section>
