<?php

namespace Database\Seeders;

use App\Models\AspekKinerja;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AspekKinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'aspek_kinerja' => 'Kualitas dan Kuantitas',
                'bobot' => '30',
                'cukup' => '>50 % hasil pekerjaan memerlukan perbaikan / penggantian agar sesuai dengan ketentuan dalam kontrak',
                'baik' => '<50 % hasil pekerjaan memerlukan perbaikan / penggantian agar sesuai dengan ketentuan dalam kontrak',
                'sangat_baik' => '100 % hasil pekerjaan sesuai dengan ketentuan dalam kontrak'
            ],
            [
                'aspek_kinerja' => 'Biaya',
                'bobot' => '20',
                'cukup' => 'Tidak menginformasikan sejak awal kondisi atau kejadian yang berpotensi menambah biaya, dan mengajukan perubahan kontrak yang akan berdampak pada penambahan total biaya tanpa alasan yang memadai sehingga ditolak oleh PPK.',
                'baik' => 'Melakukan salah satu kondisi pada kriteria cukup',
                'sangat_baik' => 'Telah melakukan pengendalian biaya dengan baik dengan menginformasikan sejak awal atas kondisi yang berpotensi menambah biaya dan perubahan kontrak yang di ajukan sudah didasari dengan alasan yang dapat di pertanggungjawabkan, sehingga penambahan biaya dapat diantisipasi.'
            ],
            [
                'aspek_kinerja' => 'Waktu',
                'bobot' => '30',
                'cukup' => 'Penyelesaian pekerjaan terlambat melebihi 50 hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia',
                'baik' => 'Penyelesaian pekerjaan terlambat sampai dengan 50 hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia',
                'sangat_baik' => 'Penyelesaian pekerjaan sesuai dengan waktu yang ditetapkan dalam kontrak / lebih cepat sesuai dengan kebutuhan PPK'
            ],
            [
                'aspek_kinerja' => 'Layanan',
                'bobot' => '20',
                'cukup' => 'Penyedia lambat memberikan tanggapan positif atas permintaan PPK dan sulit diajak berdiskusi dalam penyelesaian pelaksanaan pekerjaan.',
                'baik' => 'Merespon permintaan dengan penyelesaian sesuai dengan yang diminta atau Penyedia mudah dihubungi dan berdiskusi dalam penyelesian pelaksanan pekerjaan',
                'sangat_baik' => 'Merespon permintaan dengan penyelesaian sesuai dengan yang diminta, dan penyedia mudah dihubungi serta berdiskusi dalam penyelesaian pelaksanaan pekerjaan.'
            ],
        ];


        foreach ($data as $item) {
            AspekKinerja::create($item);
        }
    }
}
