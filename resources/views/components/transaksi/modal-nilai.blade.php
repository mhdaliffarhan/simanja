<!-- MODAL NILAI TRANSAKSI -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal"
    data-bs-target="#modalNilaiTransaksi{{ $transaksi->id }}">
    <i class="bi bi-ui-checks"></i> Nilai
</button>
<div class="modal fade" id="modalNilaiTransaksi{{ $transaksi->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nilai Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit="nilaiTransaksi({{ $transaksi->id }})">
                <div class="modal-body">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Aspek Kinerja</th>
                                <th class="text-center">Bobot</th>
                                <th class="text-center">Nilai (1-100)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aspek_kinerja as $key => $aspek)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-start">{{ $aspek['aspek_kinerja'] }}</td>
                                    <td>{{ $aspek['bobot'] }} %</td>
                                    <td><input wire:model="aspek_kinerja.{{ $key }}.nilai" class="form-control"
                                            type="number" name="" id="" min="0" max="100"
                                            required></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Nilai</button>
                </div>
            </form>
        </div>
    </div>
</div>
