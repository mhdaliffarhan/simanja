<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AspekKinerja extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'aspek_kinerja',
        'bobot'
    ];

    public static function getAll()
    {
        return self::all();
    }
}
