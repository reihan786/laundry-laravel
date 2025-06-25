<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{
    protected $fillable = [
        'jenis',
        'angka1',
        'angka2',
        'hasil'
    ];
}
