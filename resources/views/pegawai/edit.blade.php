@extends('adminlte::page')
@section('title', 'Pegawai')
@section('contend_header')
<h1 class="m-0 text-dark">Pegawai</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">

        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-warning"></i>Perhatian!</h4>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card">
            Ubah Data Pegawai
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('pegawai.update', ['pegawai' => $id]) }}" method="post">
                @method('PUT')
                @include('pegawai.form')
            </form>
        </div>
    </div>
</div>
</div>
@stop
@section('plugins.Pace', true)