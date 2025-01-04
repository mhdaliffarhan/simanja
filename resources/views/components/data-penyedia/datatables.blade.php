<section>
    <div class="row">
        <div class="col-auto me-auto">
            <h5 class="card-title">Daftar Penyedia</h5>
        </div>
        <div class="col-auto mt-3 mb-3">

            <!-- BUTTON EXPORT DATA PENYEDIA -->
            <button class="btn btn-success" wire:click="export">
                <i class="bi bi-table"></i>
                Ekspor Data
            </button>
            <!-- END BUTTON EXPORT DATA PENYEDIA -->
        </div>
        <div class="col-auto mt-3 mb-3">
            
            <a href="/tambah-penyedia" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Tambah Penyedia
            </a>
        </div>
        <table class="table datatable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Narhubung</th>
                    <th class="text-center">Jenis Usaha</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Predikat</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_penyedia as $index => $item)
                    <tr class="text-center align-middle">
                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                        <td class="text-start align-middle">{{ $item->nama }}</td>
                        <td class="text-center align-middle">
                            <div class="row">
                                <div class="col-12">
                                    {{ $item->nama_narahubung }}
                                </div>
                                <div class="col-12">
                                    {{ $item->nohp_narahubung }}</div>
                            </div>
                        </td>
                        <td class="text-center align-middle">{{ $item->jenis_usaha }}</td>
                        {{-- @if ($item->rerata_nilai === null)
                            <td class="text-center align-middle" colspan="2">
                                Belum ada data transaksi
                            </td>
                        @else --}}
                            <td class="text-center align-middle">{{ $item->rerata_nilai }}</td>
                            <td class="text-center align-middle">{{ $item->predikat }}</td>
                        {{-- @endif --}}
                        <td class="text-center align-middle">
                            @include('components.data-penyedia.modal-edit')
                            @include('components.data-penyedia.modal-delete')
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
