<section>
    <div class="row">
        <div class="col-auto me-auto">
            <h5 class="card-title">Daftar Produk</h5>
        </div>
        <div class="col-auto mt-3 mb-3">

            <!-- BUTTON EXPORT DATA PRODUK -->
            <button class="btn btn-success" wire:click="export">
                <i class="bi bi-table"></i>
                Ekspor Data
            </button>
            <!-- END BUTTON EXPORT DATA PRODUK -->
        </div>
        <div class="col-auto mt-3 mb-3">
            @include('components.data-produk.modal-tambah')
        </div>
        <table class="table datatable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Satuan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_produk as $index => $item)
                    <tr class="text-center align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode }}</td>
                        <td class="text-start">{{ $item->nama }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>
                            <!-- INCLUDE -->
                            @include('components.data-produk.modal-edit')
                            @include('components.data-produk.modal-delete')
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
