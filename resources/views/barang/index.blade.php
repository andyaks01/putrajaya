@extends('adminlte::page')

@section('title', 'Katalog Barang')

@section('content_header')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Barang</li>
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
                    @if(Auth::user()->hak_akses!='administrator' ? 'disabled="disabled"' : '')
                    <a class="btn btn-primary btn-md" href="{{ route('barang.create') }}">
                        <i class="fa fa-plus"></i> Tambah
                        @endif
                    </a>
                </div>

                <form action="{{ route('barang.index') }}" method="GET">
                    {{-- @csrf --}}
                    <div class="input-group input-group mb-3 float-right" style="width: 250px;">
                        <input type="text" name="keyword" class="form-control float-right" placeholder="Search" value="{{request()->query('keyword')}}">


                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="input-group-append">
                            <a href="{{ route('barang.index') }}" title="Refresh" class="btn btn-default"><i class="fas fa-circle-notch    "></i></a>
                        </div>
                    </div>
                </form>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">#</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Merk Barang</th>
                                <th>Stok</th>
                                <th>Harga Barang</th>
                                <th>Kondisi Barang</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1; ?>

                            @forelse($barang as $item)
                            <tr>
                                <td>
                                    {{ $no }}
                                </td>
                                <td>
                                    {{ $item->nama_barang }}
                                </td>
                                <td>
                                    {{ $item->jenis_barang }}
                                </td>
                                <td>
                                    {{ $item->merk_barang }}
                                </td>
                                <td>
                                    {{ $item->jumlah_barang }}
                                </td>
                                <td class="text-left">Rp.
                                    {{ number_format($item->harga_barang, 0, ',', '.') }}
                                </td>
                                <td>
                                    {{ $item->kondisi_barang }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if(Auth::user()->hak_akses!='administrator' ? 'disabled="disabled"' : '')
                                        <a class="btn btn-success" href="{{ route('barang.edit', ['barang' => $item->id]) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-primary" onclick="hapus('{{ $item->id}}')" href="#">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            <?php $no++; ?>

                            @empty
                            <tr>
                                <td colspan="4">
                                    Tidak ada data.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix text=right">
                    {{ $barang->links() }}
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('plugins.Sweetalert2', true)
    @section('plugins.Pace', true)

    @section('js')
    @if (session('success'))
    <script type="text/javascript">
        Swal.fire(
            'success!',
            '{{ session(', success, ') }}',
            'success',
        )
    </script>
    @endif

    <script type="text/javascript">
        function hapus(id) {

            Swal.fire({
                title: 'Konfirmasi',
                text: "Yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                canclButtonColor: '#dd3333',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.value) {

                    $.ajax({
                        url: "/barang/" + id,
                        type: 'DELETE',
                        data: {
                            '_token': $('meta[name=csrf-token]').attr("content"),
                        },
                        success: function(result) {
                            Swal.fire(
                                'Sukses!',
                                'Berhasil Dihapus',
                                'success'
                            );
                            location.reload();
                        }
                    });
                }
            })
        }
    </script>
    @stop