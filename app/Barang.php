<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        "nama_barang",
        "jenis_barang",
        "merk_barang",
        "jumlah_barang",
        "harga_barang",
        "kondisi_barang"
    ];
}
