<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    //
    protected $table = 'mpengumuman';

    protected $fillable = [
        'userid',
        'email',
        'judulpengumuman',
        'ringkasanpengumuman',
        'linkdownload',
    ];
}
