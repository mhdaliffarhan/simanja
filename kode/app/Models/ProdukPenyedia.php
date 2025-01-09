<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukPenyedia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'penyedia_id',
        'produk_id',
        'harga',
    ];

    protected $dates = ['deleted_at'];

    public function penyedia()
    {
        return $this->belongsTo(Penyedia::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public static function getAll()
    {
        return self::all();
    }
}
