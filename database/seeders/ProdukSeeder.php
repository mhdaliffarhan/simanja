<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => 'P000', 'nama' => 'kuesioner', 'satuan' => 'eksemplar'],
            ['kode' => 'P001', 'nama' => 'room only-twinshare', 'satuan' => 'OH'],
            ['kode' => 'P002', 'nama' => 'fullboard', 'satuan' => 'OH'],
            ['kode' => 'P003', 'nama' => 'breakfast', 'satuan' => 'pax'],
            ['kode' => 'P004', 'nama' => 'snack', 'satuan' => 'pax'],
            ['kode' => 'P005', 'nama' => 'Paket Halfday', 'satuan' => 'pax'],
            ['kode' => 'P006', 'nama' => 'jasa pengiriman', 'satuan' => 'koli'],
            ['kode' => 'P007', 'nama' => 'Coffee break', 'satuan' => 'pax'],
            ['kode' => 'P008', 'nama' => 'backdrop', 'satuan' => 'paket'],
            ['kode' => 'P009', 'nama' => 'spanduk', 'satuan' => 'paket'],
            ['kode' => 'P010', 'nama' => 'poster', 'satuan' => 'paket'],
            ['kode' => 'P011', 'nama' => 'leaflet', 'satuan' => 'lembar'],
            ['kode' => 'P012', 'nama' => 'jasa dokumentasi', 'satuan' => 'paket'],
            ['kode' => 'P013', 'nama' => 'sertifikat', 'satuan' => 'paket'],
            ['kode' => 'P014', 'nama' => 'souvenir', 'satuan' => 'paket'],
            ['kode' => 'P015', 'nama' => 'Fullday Meeting', 'satuan' => 'pax'],
            ['kode' => 'P016', 'nama' => 'Pena gel', 'satuan' => 'Buah'],
            ['kode' => 'P017', 'nama' => 'Tas Ransel', 'satuan' => 'Buah'],
            ['kode' => 'P018', 'nama' => 'Pekerjaan Instalasi Kabel dan Stop Kontak', 'satuan' => 'paket'],
            ['kode' => 'P019', 'nama' => 'Pekerjaan plesteran', 'satuan' => 'm2'],
            ['kode' => 'P020', 'nama' => 'Pekerjaan Lantai', 'satuan' => 'm2'],
            ['kode' => 'P021', 'nama' => 'Pekerjaan wc', 'satuan' => 'm2'],
            ['kode' => 'P022', 'nama' => 'Pekerjaan Perbaikan Atap', 'satuan' => 'm2'],
            ['kode' => 'P023', 'nama' => 'Pekerjaan kusen dan pintu', 'satuan' => 'paket'],
            ['kode' => 'P024', 'nama' => 'Pekerjaan cat', 'satuan' => 'paket'],
            ['kode' => 'P025', 'nama' => 'Pekerjaan Canopy dan Pagar', 'satuan' => 'paket'],
            ['kode' => 'P026', 'nama' => 'Pekerjaan dinding pembatas dan kolam ikan', 'satuan' => 'paket'],
            ['kode' => 'P027', 'nama' => 'pemeliharaan saniter', 'satuan' => 'paket'],
            ['kode' => 'P028', 'nama' => 'pekerjaan pintu aluminium', 'satuan' => 'paket'],
            ['kode' => 'P029', 'nama' => 'pekerjaan dinding partisi', 'satuan' => 'paket'],
            ['kode' => 'P030', 'nama' => 'pekerjaan pemindahan washtafel', 'satuan' => 'paket'],
            ['kode' => 'P031', 'nama' => 'Rapid test', 'satuan' => 'test'],
            ['kode' => 'P032', 'nama' => 'kamar', 'satuan' => 'OH'],
            ['kode' => 'P033', 'nama' => 'seragam dinas pegawai', 'satuan' => 'potong'],
            ['kode' => 'P034', 'nama' => 'Publikasi', 'satuan' => 'eksemplar'],
            ['kode' => 'P035', 'nama' => 'Perawatan Komputer', 'satuan' => 'unit'],
            ['kode' => 'P036', 'nama' => 'Upgrade Storage', 'satuan' => 'unit'],
            ['kode' => 'P037', 'nama' => 'Upgrade Memory', 'satuan' => 'unit'],
            ['kode' => 'P038', 'nama' => 'Penarikan kabel LAN', 'satuan' => 'titik'],
            ['kode' => 'P039', 'nama' => 'Pemasangan dan setting access point', 'satuan' => 'titik'],
            ['kode' => 'P040', 'nama' => 'Moisture Tester', 'satuan' => 'paket'],
            ['kode' => 'P041', 'nama' => 'Fullboard Meeting', 'satuan' => 'OH'],
            ['kode' => 'P042', 'nama' => 'Infocus', 'satuan' => 'unit'],
            ['kode' => 'P043', 'nama' => 'Baju', 'satuan' => 'potong'],
        ];

        foreach ($data as $item) {
            Produk::create($item);
        }
    }
}
