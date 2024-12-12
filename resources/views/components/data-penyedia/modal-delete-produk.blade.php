<!-- MODAL DELETE PRODUK -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteProduk{{ $itemm->id }}">
    <i class="bi bi-trash"></i>
</button>
<div class="modal fade" id="modalDeleteProduk{{ $itemm->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>apakah anda yakin akan menghapus data Produk?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form wire:submit="deleteProduk({{ $itemm->id }})">
                    <button type="submit" class="btn btn-danger">Ya,
                        Yakin!</button>
                </form>
            </div>
        </div>
    </div>
</div>
