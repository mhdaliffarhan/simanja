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
            @include('components.data-penyedia.modal-tambah')
        </div>
        <table class="table datatable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    {{-- <th class="text-center">Status</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tahun Berdiri</th> --}}
                    <th class="text-center">Narhubung</th>
                    <th class="text-center">Jenis Usaha</th>
                    <th class="text-center">Rata-rata Nilai</th>
                    <th class="text-center">Action</th>
                    {{-- <th class="text-center">Identitas Pengurus</th>
            <th class="text-center">nama Pengurus</th>
            <th class="text-center">Jabatan Pengurus</th>
            <th class="text-center">No Akta</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Notaris</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data_penyedia as $index => $item)
                    <tr class="text-center align-middle">
                        <td>{{ $index + 1 }}</td>
                        <td class="text-start">{{ $item->nama }}</td>
                        {{-- <td>{{$item->status}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->tahun_berdiri}}</td> --}}
                        <td class="text-center">
                            <div class="row">
                                <div class="col-12">
                                    {{ $item->nama_narahubung }}
                                </div>
                                <div class="col-12">
                                    {{ $item->nohp_narahubung }}</div>
                            </div>
                        </td>
                        <td>{{ $item->jenis_usaha }}</td>
                        <td>{{ $item->rerata_nilai }}</td>
                        {{-- <td>{{$item->no_identitas}}</td>
                <td>{{$item->pengurus}}</td>
                <td>{{$item->jabatan}}</td>
                <td>{{$item->no_akta}}</td>
                <td>{{$item->tanggal}}</td>
                <td>{{$item->notaris}}</td>
                <td>{{$item->no_tgl}}</td>
                <td>{{$item->masa_berlaku}}</td>
                <td>{{$item->instansi_penerbit}}</td>
                <td>{{$item->npwp}}</td> --}}
                        <td>
                            <!-- INCLUDE -->
                            @include('components.data-penyedia.modal-tambah-produk')
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
