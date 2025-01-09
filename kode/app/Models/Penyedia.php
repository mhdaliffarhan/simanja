<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyedia extends Model
{
    use HasFactory;

    protected $table = 'penyedias';

    protected $fillable = [
        'nama',
        'status',
        'alamat',
        'tahun_berdiri',
        'nohp',
        'email',
        'jenis_usaha',
        'no_identitas',
        'pengurus',
        'jabatan',
        'no_akta',
        'tanggal',
        'notaris',
        'no_tgl',
        'masa_berlaku',
        'instansi_pemberi',
        'npwp',
        'nama_narahubung',
        'nohp_narahubung',
        'jabatan_narahubung',
    ];


    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function produkPenyedia()
    {
        return $this->hasMany(ProdukPenyedia::class);
    }

    public static function getAll()
    {
        return self::all();
    }
}
