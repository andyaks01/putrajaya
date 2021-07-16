<html>

<head>
    <title>Laporan Barang</title>
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
        padding: 5px
    }
</style>

<body>
    <h1 align="center">Laporan Barang</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th width="20">No</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Merk Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Kondisi Barang</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($data as $item)
            <tr>
                <td align="center">
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
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
</body>

</html>