<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'tbl_jenis';
    protected $primaryKey = 'id_jenis';
    public $timestamps = false;

    protected $fillable = [
        'id_jenis', 'nama_jenis'
    ];
}
