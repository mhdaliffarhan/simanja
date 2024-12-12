<section>
    <div class="row">
        <div class="col-auto me-auto">
            <h5 class="card-title">Daftar Transaksi</h5>
        </div>
        <div class="col-auto mt-3 mb-3">

            <!-- BUTTON EXPORT DATA TRANSAKSI -->
            <button class="btn btn-success" wire:click="export">
                <i class="bi bi-table"></i>
                Ekspor Data
            </button>
            <!-- END BUTTON EXPORT DATA TRANSAKSI -->
        </div>
        <div class="col-auto mt-3 mb-3">
            <a href="/tambah-transaksi" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i>
                Tambah Transaksi
            </a>
        </div>
        <table class="table datatable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Transaksi</th>
                    <th class="text-center">Penyedia</th>
                    <th class="text-center">Tahun Anggaran</th>
                    <th class="text-center">Tanggal Transaksi</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_transaksi as $key => $transaksi)
                    <tr class="text-center align-middle">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transaksi->kode }}</td>
                        <td>{{ $transaksi->penyedia->nama }}</td>
                        <td>{{ $transaksi->tahun_anggaran }}</td>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->nilai }}</td>
                        <td>
                            @if (is_null($transaksi->nilai) && auth()->user()->role === 'supervisor')
                                @include('components.transaksi.modal-nilai')
                            @else
                                <button type="button" class="btn btn-secondary" disabled>
                                    <i class="bi bi-ui-checks"></i> Nilai
                                </button>
                            @endif
                            <a href="/detail-transaksi/{{ $transaksi->id }}" class="btn btn-success">
                                <i class="bi bi-sd-card"></i>
                            </a>
                            @include('components.transaksi.modal-delete-transaksi')
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
