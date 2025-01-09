<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahAdmin">
    <i class="bi bi-plus-lg"></i>
    Tambah Pengentri
</button>
<div class="modal fade" id="modalTambahAdmin" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit='tambahAdmin'>
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input wire:model="tambah_admin.username" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Password (default)</label>
                        <div class="col-sm-10">
                            <input wire:model="tambah_admin.password" type="text" class="form-control"
                                value="{{ $tambah_admin['password'] }}" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <x-primary-button>{{ __('Tambah Admin') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
