<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\Jenis;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $masuk = BarangMasuk::sum('jumlah');
        $keluar = BarangKeluar::sum('jumlah');
        $jenis = Jenis::count();

        return view('dashboard', compact('barang', 'masuk', 'keluar', 'jenis'));
    }
}
