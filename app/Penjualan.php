<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        "nama_barangg",
        "jenis_barangg",
        "nama_pembeli",
        "harga_barangg",
        "jumlah_barangg",
        "tgl_pembelian"
    ];
}
