<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Barang;
use App\Penjualan;
use App\Pegawai;
use App\User;

class LaporanController extends Controller
{
    public function barang(Request $request)
    {
        $data = Barang::get();
        $tampil['data'] = $data;

        $pdf = PDF::loadView("barang.pdf", $tampil);

        return $pdf->download('Laporan_Barang.pdf');
    }

    public function penjualan(Request $request)
    {
        $data = Penjualan::get();
        $tampil['data'] = $data;

        $pdf = PDF::loadView("penjualan.pdf", $tampil);

        return $pdf->download('Laporan_Penjualan.pdf');
    }
}
