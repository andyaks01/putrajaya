<html>

<head>
    <title>Laporan Penjualan</title>
</head>
<style>
    @page {
        margin: 10px;
    }

    body {
        margin: 10px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table tr th {
        border: 1px solid black;
        background: #c5c5c5;
        padding: 5px;
    }

    table tr td {
        border: 1px solid black;
        padding: 5px;
    }
</style>

<body>
    <h1 align="center">Laporan Penjualan</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th width="20">No</th>
                <th>Tanggal Pembelian</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Nama Pembeli</th>
                <th>Harga Barang</th>
                <th>Jumlah Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($cetakPertanggal as $item)
            <tr>
                <td align="center">
                    {{ $no }}
                </td>
                <td>
                    {{ $item->tgl_pembelian }}
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
                <td>
                    {{ $item->harga_barangg }}
                </td>
                <td>
                    {{ $item->jumlah_barangg }}
                </td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
    <script>
        window.print();
    </script>
</body>

</html>