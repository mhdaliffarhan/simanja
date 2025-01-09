<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogNilai extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'transaksi_id',
        'aspek_kinerja_id',
        'nilai_kinerja',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function aspekKinerja()
    {
        return $this->belongsTo(AspekKinerja::class);
    }

    public static function getAll()
    {
        return self::all();
    }
}
