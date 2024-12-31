@foreach ($aspek_kinerja as $key => $aspek)
    <div class="col-12 py-2 p-4 border rounded bg-gray-50">
        <div class="row">
            <div class="col-auto me-auto">
                <label for="" class="col-form-label fw-bold">{{ $aspek->aspek_kinerja }}</label>
            </div>
            <div class="col-auto ">
                <p class="fw-bold">(bobot {{ $aspek->bobot }}%)</p>
            </div>
        </div>
        <fieldset required class="row mb-3">
            <div class="col-12">
                <div class="form-check">
                    <input wire:model="selectedValues.{{ $aspek->id }}" class="form-check-input" type="radio"
                        name="{{ $aspek->aspek_kinerja }}" id="{{ $aspek->aspek_kinerja }}{{ $key }}"
                        value="1">
                    <label class="form-check-label" for="{{ $aspek->aspek_kinerja }}Cukup">
                        Cukup, {{ $aspek->cukup }}
                    </label>
                </div>
                <div class="form-check">
                    <input wire:model="selectedValues.{{ $aspek->id }}" class="form-check-input" type="radio"
                        name="{{ $aspek->aspek_kinerja }}" id="{{ $aspek->aspek_kinerja }}{{ $key }}"
                        value="2">
                    <label class="form-check-label" for="{{ $aspek->aspek_kinerja }}Baik">
                        Baik, {{ $aspek->baik }}</label>
                </div>
                <div class="form-check">
                    <input wire:model="selectedValues.{{ $aspek->id }}" class="form-check-input" type="radio"
                        name="{{ $aspek->aspek_kinerja }}" id="{{ $aspek->aspek_kinerja }}{{ $key }}"
                        value="3">
                    <label class="form-check-label" for="{{ $aspek->aspek_kinerja }}SangatBaik">
                        Sangat baik, {{ $aspek->sangat_baik }}
                    </label>
                </div>
            </div>
        </fieldset>
    </div>
@endforeach
