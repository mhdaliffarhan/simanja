<!-- MODAL DELETE TRANSAKSI -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal"
    data-bs-target="#modalDeleteTransaksi{{ $transaksi->id }}">
    <i class="bi bi-trash"></i>
</button>
<div class="modal fade" id="modalDeleteTransaksi{{ $transaksi->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>apakah anda yakin akan menghapus data Transaksi?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form wire:submit="deleteTransaksi({{ $transaksi->id }})">
                    <button type="submit" class="btn btn-danger">Ya,
                        Yakin!</button>
                </form>
            </div>
        </div>
    </div>
</div>
