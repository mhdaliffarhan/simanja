<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'satuan',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($produk) {
            // Tentukan kode berdasarkan ID yang akan di-generate
            $latestId = static::max('id') + 1; // Ambil ID berikutnya
            $produk->kode = 'P' . str_pad($latestId, 3, '0', STR_PAD_LEFT); // Format Pxxx
        });
    }

    public function penyedia()
    {
        return $this->hasMany(Penyedia::class);
    }

    public function produkTransaksi()
    {
        return $this->hasMany(ProdukTransaksi::class);
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
