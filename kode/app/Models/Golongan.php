<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Golongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan',
        'urutan',
        'target_angka_kredit'
    ];
}
