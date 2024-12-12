<?php

namespace App\Models;

use App\Models\Satker;
use App\Models\Jabatan;
use App\Models\Golongan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataPegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan_id',
        'golongan_id',
        'status',
        'pendidikan',
        'angka_kredit',
        'satker_id',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }
}
