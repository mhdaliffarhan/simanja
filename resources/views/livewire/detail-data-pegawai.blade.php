<x-slot name="breadcrumb"><div class="row pagetitle">
    <h1>Detail Pegawai</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('database-pegawai')}}">Database Pegawai</a></li>
        <li class="breadcrumb-item active">Detail Pegawai</li>
      </ol>
    </nav>
  </div>
</x-slot>
    

<section class="section dashboard">
    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Pegawai</h5>
                    <!-- Vertical Form -->
                    <form wire:submit.prevent="simpan">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Satker</label>
                            <div class="col-sm-10">
                                <select wire:model="pegawai.satker_id" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Pilih Satker</option>
                                    @foreach ($satker as $item)
                                        <option value="{{ $item->id }}">({{ $item->kode }}) {{ $item->satker }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input wire:model="pegawai.nama" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <select wire:model="pegawai.jabatan_id" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Pilih Jabatan</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Gol. Akhir</label>
                            <div class="col-sm-10">
                                <select wire:model="pegawai.golongan_id" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Pilih Golongan</option>
                                    @foreach ($golongan as $item)
                                        <option value="{{ $item->id }}">{{ $item->golongan }} ({{ $item->jenjang }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select wire:model="pegawai.status" class="form-select" aria-label="Default select example">
                                    <option value="" selected>Pilih Status</option>
                                    @foreach ($status as $item)
                                        <option value="{{ $item }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Pendidikan</label>
                            <div class="col-sm-10">
                                <input wire:model="pegawai.pendidikan" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Angka Kredit Terakhir</label>
                            <div class="col-sm-10">
                                <input wire:model="pegawai.angka_kredit" type="number" class="form-control" step="0.001" min="0">
                            </div>
                        </div>
                        <div class="row justify-content-md-end">
                            <div class="col-12 col-md-10">
                                <button type="submit" class="btn btn-primary">Ganti</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!-- Right side columns -->
        <div class="col-12 col-lg-4">

            <!-- Recent Activity -->
            <div class="card">
  
              <div class="card-body">
                <h5 class="card-title">Riwayat Angka Kredit</h5>
  
                <div class="activity">
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">Aug 2022</div>
                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                    <div class="activity-content">
                      Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">Juli 2023</div>
                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                    <div class="activity-content">
                      Voluptatem blanditiis blanditiis eveniet
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">2 hrs</div>
                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                    <div class="activity-content">
                      Voluptates corrupti molestias voluptatem
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">1 day</div>
                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                    <div class="activity-content">
                      Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">2 days</div>
                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                    <div class="activity-content">
                      Est sit eum reiciendis exercitationem
                    </div>
                  </div><!-- End activity item-->
  
                  <div class="activity-item d-flex">
                    <div class="activite-label">4 weeks</div>
                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                    <div class="activity-content">
                      Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                    </div>
                  </div><!-- End activity item-->
  
                </div>
  
              </div>
            </div><!-- End Recent Activity -->
        </div>
    </div>
</section>
