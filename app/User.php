<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatarname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return Auth()->user()->level === '9';
    }

    public function isFstatistisi(){
        return Auth()->user()->level === '1';
    }

    public function isFprakom(){
        return Auth()->user()->level === '2';
    }

    public function isPembina(){
        return Auth()->user()->level === '3';
    }

    public function isTpenilai(){
        return Auth()->user()->level === '4';
    }

    public function notFungsional(){
        return Auth()->user()->level != '1' AND Auth()->user()->level != '2';
    }

    public function getUsername(){
        return Auth()->user()->email;
    }

    public function getAvatarname(){
        return Auth()->user()->avatarname;
    }
}
