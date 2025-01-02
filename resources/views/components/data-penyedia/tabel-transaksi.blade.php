<!-- Tabel Transaksi -->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-auto me-auto">
                <h5 class="card-title">Daftar Transaksi</h5>
            </div>
            <div class="col-auto mt-3 mb-3">
                <a href="/tambah-transaksi" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Transaksi</th>
                            <th class="text-center">Tanggal Transaksi</th>
                            <th class="text-center">Tahun Anggaran</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($daftar_transaksi->isEmpty())
                            <tr>
                                <td class="text-center" colspan="5">Belum ada data transaksi</td>
                            </tr>
                        @else
                            @foreach ($daftar_transaksi as $key => $transaksi)
                                <tr class="text-center align-middle">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $transaksi->kode }}</td>
                                    <td>{{ $transaksi->tanggal }}</td>
                                    <td>{{ $transaksi->tahun_anggaran }}</td>
                                    <td>
                                        <a href="/detail-transaksi/{{ $transaksi->id }}" class="btn btn-success">
                                            <i class="bi bi-sd-card"></i>
                                        </a>
                                        @include('components.transaksi.modal-delete-transaksi')

                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
