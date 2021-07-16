@extends('adminlte::page')

@section('title', 'Pegawai')

@section('content_header')
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
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
                    <a class="btn btn-primary btn-md" href="{{ route('pegawai.create') }}">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 20px">#</th>
                                <th>Nama Pegawai</th>
                                <th>No Handphone</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>

                        <body>
                            <?php $no = 1; ?>

                            @forelse($data as $item)
                            <tr>
                                <td>
                                    {{ $no }}
                                </td>
                                <td>
                                    {{ $item->nama_pegawai}}
                                </td>
                                <td>
                                    {{ $item->no_hp }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="{{ route('pegawai.edit', ['pegawai' => $item->id]) }}">
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
                    {{ $data->links() }}
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
                        url: "/pegawai/" + id,
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