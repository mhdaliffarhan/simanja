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
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
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

                                <table class="table table-borderless datatable">
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
                                                    <a href="/nilai/{{$transaksi->id}}" class="btn btn-warning">
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
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Penyedia menurut transaksi</h5>

                            <table class="table table-borderless datatable">
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
                                                    Detail
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- Tabel Penyedia dengan Frequensi Tertinggi -->

                <!-- Top Selling -->
                {{-- <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>

                                <li><a class="dropdown-item" href="#">Today</a></li>
                                <li><a class="dropdown-item" href="#">This Month</a></li>
                                <li><a class="dropdown-item" href="#">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Top Selling <span>| Today</span></h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th class="text-center">Preview</th>
                                        <th class="text-center">Product</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Sold</th>
                                        <th class="text-center">Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg"
                                                    alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas
                                                nulla</a></td>
                                        <td>$64</td>
                                        <td class="fw-bold">124</td>
                                        <td>$5,828</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg"
                                                    alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique
                                                doloremque</a></td>
                                        <td>$46</td>
                                        <td class="fw-bold">98</td>
                                        <td>$4,508</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg"
                                                    alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi
                                                exercitationem</a></td>
                                        <td>$59</td>
                                        <td class="fw-bold">74</td>
                                        <td>$4,366</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg"
                                                    alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum
                                                error</a></td>
                                        <td>$32</td>
                                        <td class="fw-bold">63</td>
                                        <td>$2,016</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg"
                                                    alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus
                                                repellendus</a></td>
                                        <td>$79</td>
                                        <td class="fw-bold">41</td>
                                        <td>$3,239</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top Selling -->

            </div> --}}
            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
            <!-- Penyedia Terbaik -->
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Penyedia Terbaik</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penyedia_nilai_tertinggi as $abwa => $nilai_tertinggi)
                                <tr class="text-center">
                                    <th>{{ $abwa + 1 }}</th>
                                    <th class="text-start"><a
                                            href="/detail-data-penyedia/{{ $nilai_tertinggi->id }}">{{ $nilai_tertinggi->nama }}</a>
                                    </th>
                                    <td class="text-center">{{ $nilai_tertinggi->nilai_rata_rata }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
            <!-- End Penyedia Terbaik -->

            <!-- Produk Terlaris -->
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Produk terlaris</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr class="text-center">
                                <th class="text-center">No</th>
                                <th class="text-center">kode</th>
                                <th class="text-center">Nama Produk</th>
                                <th class="text-center">Jumlah Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk_terlaris as $uhuy => $produk)
                                <tr class="text-center">
                                    <th>{{ $uhuy + 1 }}</th>
                                    <th><a href="#">{{ $produk->kode }}</a></th>
                                    <td class="text-start">{{ $produk->nama }}</td>
                                    <td class="text-center">{{ $produk->produk_transaksi_count }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>

            </div>
            <!-- End Produk Terlaris -->

            {{-- <!-- Budget Report -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0">
                    <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                    <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                legend: {
                                    data: ['Allocated Budget', 'Actual Spending']
                                },
                                radar: {
                                    // shape: 'circle',
                                    indicator: [{
                                            name: 'Sales',
                                            max: 6500
                                        },
                                        {
                                            name: 'Administration',
                                            max: 16000
                                        },
                                        {
                                            name: 'Information Technology',
                                            max: 30000
                                        },
                                        {
                                            name: 'Customer Support',
                                            max: 38000
                                        },
                                        {
                                            name: 'Development',
                                            max: 52000
                                        },
                                        {
                                            name: 'Marketing',
                                            max: 25000
                                        }
                                    ]
                                },
                                series: [{
                                    name: 'Budget vs spending',
                                    type: 'radar',
                                    data: [{
                                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                                            name: 'Allocated Budget'
                                        },
                                        {
                                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                                            name: 'Actual Spending'
                                        }
                                    ]
                                }]
                            });
                        });
                    </script>

                </div>
            </div><!-- End Budget Report -->

            <!-- Website Traffic -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0">
                    <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                    <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            echarts.init(document.querySelector("#trafficChart")).setOption({
                                tooltip: {
                                    trigger: 'item'
                                },
                                legend: {
                                    top: '5%',
                                    left: 'center'
                                },
                                series: [{
                                    name: 'Access From',
                                    type: 'pie',
                                    radius: ['40%', '70%'],
                                    avoidLabelOverlap: false,
                                    label: {
                                        show: false,
                                        position: 'center'
                                    },
                                    emphasis: {
                                        label: {
                                            show: true,
                                            fontSize: '18',
                                            fontWeight: 'bold'
                                        }
                                    },
                                    labelLine: {
                                        show: false
                                    },
                                    data: [{
                                            value: 1048,
                                            name: 'Search Engine'
                                        },
                                        {
                                            value: 735,
                                            name: 'Direct'
                                        },
                                        {
                                            value: 580,
                                            name: 'Email'
                                        },
                                        {
                                            value: 484,
                                            name: 'Union Ads'
                                        },
                                        {
                                            value: 300,
                                            name: 'Video Ads'
                                        }
                                    ]
                                }]
                            });
                        });
                    </script>

                </div>
            </div><!-- End Website Traffic -->

            <!-- News & Updates Traffic -->
            <div class="card">
                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body pb-0">
                    <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                    <div class="news">
                        <div class="post-item clearfix">
                            <img src="assets/img/news-1.jpg" alt="">
                            <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                            <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-2.jpg" alt="">
                            <h4><a href="#">Quidem autem et impedit</a></h4>
                            <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-3.jpg" alt="">
                            <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                            <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-4.jpg" alt="">
                            <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                            <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                        </div>

                        <div class="post-item clearfix">
                            <img src="assets/img/news-5.jpg" alt="">
                            <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                            <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...
                            </p>
                        </div>

                    </div><!-- End sidebar recent posts-->

                </div>
            </div><!-- End News & Updates --> --}}

        </div><!-- End Right side columns -->

    </div>
</section>
