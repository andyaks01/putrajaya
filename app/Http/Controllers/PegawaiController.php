<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pegawai::paginate(10);

        $tampil['data'] = $data;

        return view("pegawai.index", $tampil);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pegawai.create");
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
            'nama_pegawai' => 'required',
            'no_hp' => 'required'
        ]);

        $data = Pegawai::create($request->all());
        return redirect()->route("pegawai.index")->with(
            "success",
            "Data Pegawai Berhasil Disimpan."
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pegawai)
    {
        $data = Pegawai::findOrFail($pegawai);

        return view("pegawai.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pegawai)
    {
        $this->validate($request, [
            'nama_pegawai' => 'required',
            'no_hp' => 'required'
        ]);

        $data = Pegawai::findOrFail($pegawai);
        $data->nama_pegawai = $request->nama_pegawai;
        $data->no_hp = $request->no_hp;
        $data->save();

        return redirect()->route("pegawai.index")->with(
            "success",
            "Data Pegawai Berhasil Diubah."
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pegawai)
    {
        $data = Pegawai::findOrFail($pegawai);
        $data->delete();
    }
}
