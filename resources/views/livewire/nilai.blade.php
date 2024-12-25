<x-slot name="breadcrumb">
    <div class="row pagetitle">
        <h1>Nilai</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Nilai</li>
            </ol>
        </nav>
    </div>
</x-slot>
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Penilaian Kinerja Penyedia</h5>
                    <div>
                        <table class="table">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th class="border border-gray-300 px-4 ">No</th>
                                    <th class="border border-gray-300 px-4 ">ASPEK KINERJA</th>
                                    <th class="border border-gray-300 px-4 ">BOBOT</th>
                                    <th class="border border-gray-300 px-4 ">KRITERIA</th>
                                    <th class="border border-gray-300 px-4 ">URAIAN PENILAIAN ATAS CAPAIAN INDIKATOR
                                        KINERJA</th>
                                    <th class="border border-gray-300 px-4 ">SKOR</th>
                                    <th class="border border-gray-300 px-4 ">NILAI KINERJA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aspek_kinerja as $key => $aspek)
                                    <tr class="align-middle">
                                        <td rowspan="3" class="border border-gray-300 px-4 ">
                                            {{ $key + 1 }}
                                        </td>
                                        <td rowspan="3" class="border border-gray-300 px-4 ">
                                            {{ $aspek['aspek_kinerja'] }}
                                        </td>
                                        <td rowspan="3" class="border border-gray-300 px-4 ">
                                            {{ $aspek['bobot'] }}%
                                        </td>
                                        <td class="border border-gray-300 px-4 ">
                                            Cukup
                                        </td>
                                        <td class="border border-gray-300 px-4 ">
                                            {{ $aspek['cukup'] }}
                                        </td>
                                        <td rowspan="3" class="border border-gray-300 px-4 ">
                                            <input type="number" wire:model="skor_kualitas"
                                                class="form-input border-gray-300 w-full" min="1"
                                                max="3" />
                                        </td>
                                        <td rowspan="3" class="border border-gray-300 px-4 ">
                                            {{ $kinerja_kualitas }}
                                        </td>
                                    <tr class="align-middle">
                                        <td class="border border-gray-300 px-4 ">
                                            Baik
                                        </td>
                                        <td class="border border-gray-300 px-4 ">
                                            {{ $aspek['baik'] }}
                                        </td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td class="border border-gray-300 px-4 ">
                                            Sangat Baik
                                        </td>
                                        <td class="border border-gray-300 px-4 ">
                                            {{ $aspek['sangat_baik'] }}
                                        </td>
                                    </tr>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Total -->
                        <div class="mt-4 p-4 border rounded bg-gray-50">
                            <p class="font-bold">Total Nilai Kinerja: {{ $total_kinerja }}</p>
                            <p class="font-bold">Predikat: {{ $predikat }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
