<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Tambah Penyedia</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('database-penyedia') }}">Database Penyedia</a></li>
                <li class="breadcrumb-item active">Tambah Penyedia</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tambah Data Penyedia</h5>
                    <form wire:submit.prevent="tambahPenyedia">
                        <div class="mb-3">
                            <span class="text-muted pt-1 fw-bold">Data Badan Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama *</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.nama" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Status *</label>
                            <div class="col-sm-10">
                                <select wire:model="tambah_penyedia.status" class="form-select"
                                    aria-label="Default select example" required>
                                    <option value="{{ null }}" selected>Pilih status</option>
                                    <option value="Pusat">Pusat</option>
                                    <option value="Cabang">Cabang </option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat_penyedia" class="col-sm-2 col-form-label">Alamat *</label>
                            <div class="col-sm-10">
                                <textarea wire:model="tambah_penyedia.alamat" id="alamat_penyedia" required class="form-control" style="height: 50px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_usaha_penyedia" class="col-sm-2 col-form-label">Jenis Usaha *</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.jenis_usaha" id="jenis_usaha_penyedia" type="text"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun Berdiri</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.tahun_berdiri" type="number" min="2000"
                                    max="2100" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp_penyedia" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.nohp" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email_penyedia" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input wire:model="tambah_penyedia.email" class="form-control" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Pengurus Badan Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="no_identitas_pengurus" class="col-sm-2 col-form-label">No Identitas</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.no_identitas" id="no_identitas_pengurus"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pengurus_pengurus" class="col-sm-2 col-form-label">Nama Pengurus</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.pengurus" id="pengurus_pengurus" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jabatan_pengurus" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.jabatan" id="jabatan_pengurus" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Landasan Hukum Pendirian Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="no_akta" class="col-sm-2 col-form-label">Nomor Akta</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.no_akta" id="no_akta" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.tanggal" id="tanggal" type="date"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="notaris" class="col-sm-2 col-form-label">Notaris</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.notaris" id="notaris" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Izin Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="no_tgl" class="col-sm-2 col-form-label">No/Tgl Izin Usaha</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.no_tgl" id="no_tgl" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="masa_berlaku" class="col-sm-2 col-form-label">Masa Berlaku</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.masa_berlaku" id="masa_berlaku" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instansi_pemberi" class="col-sm-2 col-form-label">Instansi Pemberi</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.instansi_pemberi" id="instansi_pemberi"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Data Keuangan</span>
                        </div>
                        <div class="row mb-3">
                            <label for="npwpi" class="col-sm-2 col-form-label">NPWP</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.npwp" id="npwp" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Narahubung</span>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_narahubung" class="col-sm-2 col-form-label">Nama *</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.nama_narahubung" id="nama_narahubung"
                                    type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp_narahubung" class="col-sm-2 col-form-label">Ho HP *</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.nohp_narahubung" id="nohp_narahubung"
                                    type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jabatan_narahubung" class="col-sm-2 col-form-label">Jabatan *</label>
                            <div class="col-sm-10">
                                <input wire:model="tambah_penyedia.jabatan_narahubung" id="jabatan_narahubung"
                                    type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row justify-content-md-end">
                            <div class="col-12 col-md-10">
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>