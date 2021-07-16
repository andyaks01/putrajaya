@extends('adminlte::page')

@section('title', 'Manajemen Penjualan')

@section('content_header')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Penjualan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Penjualan</li>
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
                    <a class="btn btn-primary btn-md" href="{{ route('penjualan.create') }}">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <form action="{{ route('penjualan.index') }}" method="GET">
                    {{-- @csrf --}}
                    <div class="input-group input-group mb-3 float-right" style="width: 250px;">
                        <input type="date" name="keyword" class="form-control float-right" value="{{request()->query('keyword')}}">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                        <div class="input-group-append">
                            <a href="{{ route('penjualan.index') }}" title="Refresh" class="btn btn-default"><i class="fas fa-circle-notch    "></i></a>
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
                                <th>Nama Pembeli</th>
                                <th>Harga Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Tanggal Pembelian</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>

                        <body>
                            <?php $no = 1; ?>

                            @forelse($penjualan as $item)
                            <tr>
                                <td>
                                    {{ $no }}
                                </td>
                                <td>
                                    {{ $item->nama_barangg }}
                                </td>
                                <td>
                                    {{ $item->jenis_barangg }}
                                </td>
                                <td>
                                    {{ $item->nama_pembeli }}
                                </td>
                                <td class="text-left">Rp.
                                    {{ number_format($item->harga_barangg, 0, ',', '.') }}
                                </td>
                                <td class="text-center">
                                    {{ $item->jumlah_barangg }}
                                </td>
                                <td>
                                    {{ $item->tgl_pembelian }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="{{ route('penjualan.edit', ['penjualan' => $item->id]) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-primary" onclick="hapus('{{ $item->id}}')" href="#">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
                    {{ $penjualan->links() }}
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
                        url: "/penjualan/" + id,
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