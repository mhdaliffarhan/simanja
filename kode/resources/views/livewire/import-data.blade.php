<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Impor Data</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Impor Data</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto me-auto">
                            <h5 class="card-title">Import Excel</h5>
                        </div>
                        <div class="col-auto mt-3 mb-3">
                            <button wire:click="downloadTemplate" class="btn btn-success w-100">
                                Unduh Template Excel
                            </button>
                        </div>
                        <div class="col-12 col-md-12">
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading"> 
                                    <i class="bi bi-info-circle me-1"></i>
                                    Perhatian: Efek Fitur Impor Data</h4>
                                <p>
                                    Saat Anda mengimpor data dari file Excel, sistem akan melakukan langkah-langkah berikut:
                                </p>
                                <ol>
                                    <li>
                                        <b>Pencarian Primary Key</b>
                                        Sistem akan memeriksa primary key pada database untuk memastikan apakah data sudah ada atau belum.
                                    </li>
                                    <li>
                                        <b>Update Data</b>
                                        Jika data dengan primary key yang sama sudah ada di database, maka data akan diperbarui berdasarkan data yang ada di file Excel.
                                    </li>
                                    <li>
                                        <b>Pembuatan Data Baru</b>
                                        Jika data dengan primary key tersebut belum ada, maka sistem akan membuat data baru berdasarkan atribut yang terdapat dalam file Excel.
                                    </li>
                                </ol>
                                <p>
                                    Proses ini akan diterapkan untuk kedua tabel berikut:
                                </p>
                                <ul>
                                    <li><b>Tabel Penyedia:</b> Data penyedia yang terkait.</li>
                                    <li><b>Tabel Produk:</b> Data produk yang terkait.</li>
                                </ul>
                                <hr>
                                <p class="mb-0">
                                    <strong>Catatan:</strong> Pastikan data di file Excel yang diunggah sudah sesuai dengan format dan atribut yang telah ditentukan. Kesalahan dalam data dapat menyebabkan gagal impor atau data yang tidak akurat.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 mb-4">
                            <input class="form-control w-100" type="file" id="formFile" wire:model="file">
                        </div>
                        <div class="col-12 col-md-12">
                            <!-- Vertically centered Modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verifikasi-impor">
                                Impor Data
                            </button>
                            <div class="modal fade" id="verifikasi-impor" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Impor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin akan mengimpor data?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary" wire:click="import">Yakin</button>
                                    </div>
                                </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
