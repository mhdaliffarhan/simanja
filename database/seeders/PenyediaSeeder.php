<?php

namespace Database\Seeders;

use App\Models\Penyedia;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenyediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'CV. Graphic Dwipa',
                'status' => 'pusat',
                'alamat' => 'Jl. Abdul Muiz No.21 C Padang',
                'tahun_berdiri' => '2004',
                'nohp' => '812666414041',
                'email' => 'Graphic.dwipa69@gmail.com',
                'jenis_usaha' => 'jasa percetakan',
                'no_identitas' => '1371110508690000',
                'pengurus' => 'Yunda Abdi',
                'jabatan' => 'Direktur',
                'no_akta' => '1',
                'tanggal' => '2004-05-01',
                'notaris' => 'Yusmarni, SH',
                'no_tgl' => '0213-0385/03.07/PK/SIUP/II/2016-PROB',
                'masa_berlaku' => '19/02/2016 -19/02/2021',
                'instansi_pemberi' => 'DPMPTSP Kota Padang',
                'npwp' => '02.631.103.1-201.000',
            ],
            [
                'nama' => 'Hotel Pangeran Beach',
                'status' => 'pusat',
                'alamat' => 'Jl. Ir. H Juanda No 79 Padang, 25155',
                'tahun_berdiri' => null,
                'nohp' => '7517051333',
                'email' => 'reservation@beach.hotelpangeran.com',
                'jenis_usaha' => 'jasa perhotelan',
                'no_identitas' => null,
                'pengurus' => 'soedjoko',
                'jabatan' => 'general manager',
                'no_akta' => null,
                'tanggal' => null,
                'notaris' => null,
                'no_tgl' => null,
                'masa_berlaku' => null,
                'instansi_pemberi' => null,
                'npwp' => null,
            ],
            [
                'nama' => 'Rocky Plaza Hotel Padang',
                'status' => 'pusat',
                'alamat' => 'Jl. Permindo No.40 Kampung Baru, Padang',
                'tahun_berdiri' => '2001',
                'nohp' => '751840888',
                'email' => 'reservation@rockyplazahotelpadang.com',
                'jenis_usaha' => 'jasa perhotelan',
                'no_identitas' => null,
                'pengurus' => 'Buyung Arani',
                'jabatan' => 'general manager',
                'no_akta' => '31',
                'tanggal' => '2015-09-07',
                'notaris' => 'H. Hendri Final, SH',
                'no_tgl' => '03.07.55.02374',
                'masa_berlaku' => '11 oktober 2020',
                'instansi_pemberi' => 'BPMP2T kota Padang',
                'npwp' => '01.200.406.5-201.000',
            ],
            [
                'nama' => 'Grand Inna Padang',
                'status' => 'pusat',
                'alamat' => 'Jl. Gereja No. 34 Padang',
                'tahun_berdiri' => null,
                'nohp' => '75135600',
                'email' => 'sm@grandinnamura.com',
                'jenis_usaha' => 'jasa perhotelan',
                'no_identitas' => '1371102702670000',
                'pengurus' => 'Masri Tanjung',
                'jabatan' => 'general Manager',
                'no_akta' => '28',
                'tanggal' => '2019-04-25',
                'notaris' => 'Titiek Irawati, SH',
                'no_tgl' => '2576-1601/IG-NI/BPMPTSP/XI/2015-PROB',
                'masa_berlaku' => '5 TAHUN',
                'instansi_pemberi' => 'Pemko Padang',
                'npwp' => '01.001.617.8.201.001',
            ],
        ];
        foreach ($data as $item) {
            Penyedia::create($item);
        }
    }
}
