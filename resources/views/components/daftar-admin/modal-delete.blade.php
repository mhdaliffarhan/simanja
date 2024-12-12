
<button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDeleteAdmin{{$item->id}}">
  <i class="bi bi-trash"></i> Hapus
</button>
<div class="modal fade" id="modalDeleteAdmin{{$item->id}}" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Data Admin {{$item->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <p>apakah anda yakin akan menghapus data admin?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form wire:submit="deleteAdmin({{$item->id}})">
            <button type="submit" class="btn btn-danger">Ya, Yakin!</button>
          </form>
        </div>
    </div>
  </div>
</div>