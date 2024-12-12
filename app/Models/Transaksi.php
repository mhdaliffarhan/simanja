<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'tanggal',
        'penyedia_id',
        'nilai_kontrak',
        'nilai',
        'tahun_anggaran',
        'keterangan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            // Tentukan kode berdasarkan ID yang akan di-generate
            $latestId = static::max('id') + 1; // Ambil ID berikutnya
            $transaksi->kode = 'T' . str_pad($latestId, 3, '0', STR_PAD_LEFT); // Format Pxxx
        });
    }
    public function penyedia()
    {
        return $this->belongsTo(Penyedia::class);
    }

    public function produkTransaksi()
    {
        return $this->hasMany(ProdukTransaksi::class);
    }
    public static function getAll()
    {
        return self::all();
    }
}
