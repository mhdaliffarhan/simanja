<!-- Tabel Produk -->
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-auto me-auto">
                <h5 class="card-title">Daftar Produk</h5>
            </div>
            <div class="col-auto mt-3 mb-3">
                @include('components.data-penyedia.modal-tambah-produk')
            </div>
        </div>
        <div class="mb-3">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Produk</th>
                        <th class="text-center">Harga</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($data_produk->isEmpty())
                        <tr>
                            <td class="text-center" colspan="4">Belum ada data produk</td>
                        </tr>
                    @else
                        @foreach ($data_produk as $index => $itemm)
                            <tr class="text-center align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td class="text-start">{{ $itemm->produk->nama }}</td>
                                <td>
                                    {{-- <input class="form-control" type="number" min="0"
                                  value="{{ $item->harga }}"> --}}
                                    {{ $itemm->harga }}
                                </td>
                                <td>
                                    @include('components.data-penyedia.modal-delete-produk')
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
