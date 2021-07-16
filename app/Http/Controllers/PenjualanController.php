<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;

class PenjualanController extends Controller
{
    public $keyword = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $penjualan = Penjualan::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;

            $penjualan = $penjualan->where('tgl_pembelian', 'like', "%" . $this->keyword . "%");
        };

        return view("penjualan.index")->with('penjualan', $penjualan->paginate(10));


        //$data = Penjualan::paginate(10);

        //$tampil['data'] = $data;

        //return view("penjualan.index", $tampil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("penjualan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barangg' => 'required',
            'jenis_barangg' => 'required',
            'nama_pembeli' => 'required',
            'harga_barangg' => 'required|numeric',
            'jumlah_barangg' => 'required|numeric',
            'tgl_pembelian' => 'required|date'
        ]);

        $data = Penjualan::create($request->all());
        return redirect()->route("penjualan.index")->with(
            "success",
            "Data Berhasil Disimpan."
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($penjualan)
    {
        $data = Penjualan::findOrFail($penjualan);

        return view("penjualan.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $penjualan)
    {
        $this->validate($request, [
            'nama_barangg' => 'required',
            'jenis_barangg' => 'required',
            'nama_pembeli' => 'required',
            'harga_barangg' => 'required|numeric',
            'jumlah_barangg' => 'required|numeric',
            'tgl_pembelian' => 'required|date'
        ]);

        $data = Penjualan::findOrFail($penjualan);
        $data->nama_barangg = $request->nama_barangg;
        $data->jenis_barangg = $request->jenis_barangg;
        $data->nama_pembeli = $request->nama_pembeli;
        $data->harga_barangg = $request->harga_barangg;
        $data->jumlah_barangg = $request->jumlah_barangg;
        $data->tgl_pembelian = $request->tgl_pembelian;
        $data->save();

        return redirect()->route("penjualan.index")->with(
            "success",
            "Data Berhasil Diubah."
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($penjualan)
    {
        $data = Penjualan::findOrFail($penjualan);
        $data->delete();
    }

    public function cetakPenjualanPertanggal($tglawal, $tglakhir)
    {

        $cetakPertanggal = Penjualan::latest()->whereBetween('tgl_pembelian', [$tglawal, $tglakhir])->get();
        return view(('penjualan.cetak-penjualan-pertanggal'), compact('cetakPertanggal'));
    }
}
