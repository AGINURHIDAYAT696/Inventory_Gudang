<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'tbl_barang_keluar';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_transaksi', 'tanggal', 'barang', 'jumlah'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang', 'id_barang');
    }
}
