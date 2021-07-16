@extends('adminlte::page')
@section('title', 'Laporan')

@section('content_header')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @stop

    @section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Download Laporan Format PDF</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-app" href="/laporan/barang">
                        <i class="fas fa-building"></i> Barang PDF
                    </a>
                    <a class="btn btn-app" href="/laporan/penjualan">
                        <i class="fas fa-cash-register"></i> Penjualan PDF
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Download Laporan Penjualan Pertanggal</h3>
                        </div>
                        <form>
                            <div class="row">
                                <div class="card-body">
                                    <label>Dari Tanggal</label>
                                    <input type="date" name="tglawal" id="tglawal" class="form-control" style="width: 250px;">
                                </div>
                                <div class="card-body">
                                    <label>Ke Tanggal</label>
                                    <input type="date" name="tglakhir" id="tglakhir" class="form-control" style="width: 250px;">
                                </div>
                            </div>
                            <div class="card-body" style="width: 1085px;">
                                <a href="" onclick="this.href='/cetak-data-pertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary col-md-1">Print
                                    <i class="fas fa-print"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop