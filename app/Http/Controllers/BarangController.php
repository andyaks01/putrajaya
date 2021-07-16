<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    public $keyword = '';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barang = Barang::latest();

        if (!empty($request->keyword)) {
            $this->keyword = $request->keyword;

            $barang = $barang->where('nama_barang', 'like', "%" . $this->keyword . "%");
        };

        return view("barang.index")->with('barang', $barang->paginate(10));

        //$data = Barang::paginate(10);

        //$tampil['data'] = $data;

        //return view("barang.index", $tampil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("barang.create");
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
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'merk_barang' => 'required',
            'jumlah_barang' => 'required|numeric',
            'harga_barang' => 'required|numeric',
            'kondisi_barang' => 'required'
        ]);

        $data = Barang::create($request->all());
        return redirect()->route("barang.index")->with("success", "Data Berhasil Disimpan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($barang)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($barang)
    {
        $data = Barang::findOrFail($barang);

        return view("barang.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $barang)
    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'merk_barang' => 'required',
            'jumlah_barang' => 'required',
            'harga_barang' => 'required',
            'kondisi_barang' => 'required'
        ]);

        $data = Barang::findOrFail($barang);
        $data->nama_barang = $request->nama_barang;
        $data->jenis_barang = $request->jenis_barang;
        $data->merk_barang = $request->merk_barang;
        $data->jumlah_barang = $request->jumlah_barang;
        $data->harga_barang = $request->harga_barang;
        $data->kondisi_barang = $request->kondisi_barang;
        $data->save();

        return redirect()->route("barang.index")->with(
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
    public function destroy($barang)
    {
        $data = Barang::findOrFail($barang);
        $data->delete();
    }
}
