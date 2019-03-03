<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangdiskusi extends Model
{
    //
    protected $table = 'mruangdiskusi';

    protected $fillable = [
        'userid',
        'email',
        'judulruangdiskusi',
        'ringkasanruangdiskusi',
    ];

}
