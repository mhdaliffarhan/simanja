<x-slot name="breadcrumb">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <!-- Button Export All -->
                <div class="col-xxl-12 col-md- mb-0">
                    <div class="card">
                        <div class="card-body m-0 p-0">
                            <button class="btn btn-outline-success w-100" wire:click="exportAll">
                                <i class="bi bi-table"></i>
                                Ekspor Data</button>
                        </div>
                    </div>
                </div>

                <!-- Jumlah Pegawai BPS Se Sumatera Barat -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Jumlah Penyedia</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlah_penyedia }}</h6>
                                    <span class="text-muted small pt-1 fw-bold">Badan Usaha</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title">Jumlah Produk</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart4"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlah_produk }}</h6>
                                    <span class="text-muted small pt-1 fw-bold">Produk</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Jumlah Transaksi -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Jumlah Transaksi</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-credit-card"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlah_transaksi }}</h6>
                                    <span class="text-muted small pt-1 fw-bold">Transaksi</span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Tabel Transaksi Belum di Nilai -->
                @if (auth()->user()->role == 'supervisor' && !$transaksi_belum_dinilai->isEmpty())
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Transaksi belum dinilai</h5>

                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-center">No</th>
                                            <th class="text-center">Kode Transaksi</th>
                                            <th class="text-center">Penyedia</th>
                                            <th class="text-center">Tanggal Transaksi</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaksi_belum_dinilai as $kiww => $transaksi)
                                            <tr class="text-center">
                                                <th scope="row">{{ $kiww + 1 }}</th>
                                                <td>{{ $transaksi->kode }}</td>
                                                <td>{{ $transaksi->penyedia->nama }}</td>
                                                <td>{{ $transaksi->tanggal }}</td>
                                                <td>
                                                    <a href="/nilai/{{$transaksi->id}}" class="btn btn-warning btn-sm">
                                                        <i class="bi bi-ui-checks"></i> Nilai
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- Tabel Transaksi Belum di Nilai -->
                @endif


                <!-- Tabel penyedia dengan frekuensi transaksi tertinggi -->
                @if (!$penyedia_terlaris->isEmpty())
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Penyedia menurut transaksi</h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr class="text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Penyedia</th>
                                        <th class="text-center">Jenis Usaha</th>
                                        <th class="text-center">Jumlah Transaksi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penyedia_terlaris as $kiw => $penyedia)
                                        <tr class="text-center">
                                            <th scope="row">{{ $kiw + 1 }}</th>
                                            <td class="text-start">{{ $penyedia->nama }}</td>
                                            <td>{{ $penyedia->jenis_usaha }}</td>
                                            <td class="text-center">{{ $penyedia->transaksi_count }}</td>
                                            <td>
                                                <a href="/detail-data-penyedia/{{ $penyedia->id }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="bi bi-sd-card"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
                @endif
            </div>
        </div>
        <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
            <!-- Penyedia Terbaik -->
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Penyedia Terbaik</h5>

                    <table class="table table-borderless">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($penyedia_nilai_tertinggi->isEmpty())
                                <tr>
                                    <td colspan="3" class="text-center">Data belum ada</td>
                                </tr>
                            @else
                                @foreach ($penyedia_nilai_tertinggi as $abwa => $nilai_tertinggi)
                                    <tr class="text-center">
                                        <th>{{ $abwa + 1 }}</th>
                                        <th class="text-start"><a
                                                href="/detail-data-penyedia/{{ $nilai_tertinggi->id }}">{{ $nilai_tertinggi->nama }}</a>
                                        </th>
                                        <td class="text-center">{{ $nilai_tertinggi->nilai_rata_rata }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- End Penyedia Terbaik -->

            <!-- Produk Terlaris -->
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Produk terlaris</h5>

                    <table class="table table-borderless">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">kode</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Jumlah Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($produk_terlaris->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">Data belum ada</td>
                                </tr>
                            @else
                                @foreach ($produk_terlaris as $uhuy => $produk)
                                    <tr class="text-center">
                                        <th>{{ $uhuy + 1 }}</th>
                                        <th><a href="#">{{ $produk->kode }}</a></th>
                                        <td class="text-start">{{ $produk->nama }}</td>
                                        <td class="text-center">{{ $produk->produk_transaksi_count }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                </div>

            </div>
            <!-- End Produk Terlaris -->
        </div><!-- End Right side columns -->
    </div>
</section>
