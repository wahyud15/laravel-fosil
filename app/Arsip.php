<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    //
    protected $table = 'marsip';

    protected $fillable = [
        'userid',
        'email',
        'judul',
        'ringkasan',
        'linkdownload',
    ];
}
