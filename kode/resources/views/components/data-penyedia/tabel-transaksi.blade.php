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
                <table class="table datatableTransaksi">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode</th>
                            <th class="text-center">Uraian Pekerjaan</th>
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
                                    <td class="align-middle">{{ $key + 1 }}</td>
                                    <td class="align-middle">{{ $transaksi->kode }}</td>
                                    <td class="text-start align-middle">{{ $transaksi->uraian_pekerjaan }}</td>
                                    <td class="align-middle">
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
