<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Detail Data Penyedia</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('database-penyedia') }}">Database Penyedia</a></li>
                <li class="breadcrumb-item active">Detail Penyedia</li>
            </ol>
        </nav>
    </div>
</x-slot>

<section class="section dashboard">
    <div class="row">

        <!-- Data Penyedia -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="simpan">
                        <h5 class="card-title">Data Penyedia</h5>
                        <div class="mb-3">
                            <span class="text-muted pt-1 fw-bold">Data Badan Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.nama" type="text" class="form-control"
                                    value="{{ $data_penyedia['nama'] }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select wire:model="data_penyedia.status" class="form-select" required>
                                    <option value="{{ $data_penyedia['status'] }}" selected>
                                        {{ $data_penyedia['status'] }}</option>
                                    @if ($data_penyedia['status'] == 'Cabang')
                                        <option value="Pusat">Pusat</option>
                                    @else
                                        <option value="Cabang">Cabang </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="alamat_penyedia" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea wire:model="data_penyedia.alamat" id="alamat_penyedia" class="form-control" style="height: 50px" required>{{ $data_penyedia['alamat'] }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jenis_usaha_penyedia" class="col-sm-2 col-form-label">Jenis Usaha</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.jenis_usaha"
                                    value="{{ $data_penyedia['jenis_usaha'] }}" id="jenis_usaha_penyedia" type="text"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Tahun Berdiri</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.tahun_berdiri"
                                    value="{{ $data_penyedia['tahun_berdiri'] }}" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp_penyedia" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.nohp" value="{{ $data_penyedia['nohp'] }}"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email_penyedia" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <x-text-input wire:model="data_penyedia.email" id="email_penyedia"
                                        value="{{ $data_penyedia['email'] }}" class="form-control" type="email" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Pengurus Badan Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="no_identitas_pengurus" class="col-sm-2 col-form-label">No Identitas</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.no_identitas"
                                    value="{{ $data_penyedia['no_identitas'] }}" id="no_identitas_pengurus"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pengurus_pengurus" class="col-sm-2 col-form-label">Nama Pengurus</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.pengurus" value="{{ $data_penyedia['pengurus'] }}"
                                    id="pengurus_pengurus" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jabatan_pengurus" class="col-sm-2 col-form-label">Nama Pengurus</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.jabatan" value="{{ $data_penyedia['jabatan'] }}"
                                    id="jabatan_pengurus" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Landasan Hukum Pendirian Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="no_akta" class="col-sm-2 col-form-label">Nomor Akta</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.no_akta" value="{{ $data_penyedia['no_akta'] }}"
                                    id="no_akta" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.tanggal" value="{{ $data_penyedia['tanggal'] }}"
                                    id="tanggal" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="notaris" class="col-sm-2 col-form-label">Notaris</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.notaris" value="{{ $data_penyedia['notaris'] }}"
                                    id="notaris" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Izin Usaha</span>
                        </div>
                        <div class="row mb-3">
                            <label for="no_tgl" class="col-sm-2 col-form-label">No/Tgl Izin Usaha</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.no_tgl" value="{{ $data_penyedia['no_tgl'] }}"
                                    id="no_tgl" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="masa_berlaku" class="col-sm-2 col-form-label">Masa Berlaku</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.masa_berlaku"
                                    value="{{ $data_penyedia['masa_berlaku'] }}" id="masa_berlaku" type="text"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instansi_pemberi" class="col-sm-2 col-form-label">Instansi Pemberi</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.instansi_pemberi"
                                    value="{{ $data_penyedia['instansi_pemberi'] }}" id="instansi_pemberi"
                                    type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Data Keuangan</span>
                        </div>
                        <div class="row mb-3">
                            <label for="npwpi" class="col-sm-2 col-form-label">NPWP</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.npwp" value="{{ $data_penyedia['npwp'] }}"
                                    id="npwp" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="mb-3 mt-2">
                            <span class="text-muted pt-1 fw-bold">Narahubung</span>
                        </div>
                        <div class="row mb-3">
                            <label for="nama_narahubung" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.nama_narahubung" id="nama_narahubung" type="text"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nohp_narahubung" class="col-sm-2 col-form-label">Ho HP</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.nohp_narahubung" id="nohp_narahubung" type="text"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jabatan_narahubung" class="col-sm-2 col-form-label">Jabatan</label>
                            <div class="col-sm-10">
                                <input wire:model="data_penyedia.jabatan_narahubung" id="jabatan_narahubung"
                                    type="text" class="form-control" required>
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

        <!-- Sisi Kanan -->
        <div class="col-lg-6">

            <!-- Tabel Produk -->
            @include('components.data-penyedia.tabel-produk')

            @include('components.data-penyedia.tabel-transaksi')
        </div>
</section>
