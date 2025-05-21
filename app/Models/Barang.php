<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'tbl_barang';
    protected $primaryKey = 'id_barang';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_barang', 'nama_barang', 'jenis', 'stok_minimum', 'stok', 'satuan', 'foto'
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis', 'id_jenis');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'satuan', 'id_satuan');
    }
}
