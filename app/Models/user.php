<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;

    protected $fillable = [
        'nama_user', 'username', 'password', 'hak_akses'
    ];

    protected $hidden = [
        'password',
    ];
}
