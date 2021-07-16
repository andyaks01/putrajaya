{{ csrf_field() }}


<div class="form-group">
    <label for="nama_barangg" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-10">
        <input type="text" name="nama_barangg" id="nama_barangg" class="form-control" value="{{ $nama_barangg ??''}}">
    </div>
</div>

<div class="form-group">
    <label for="jenis_barangg" class="col-sm-2 control-label">Jenis Barang</label>
    <div class="col-sm-10">
        <input type="text" name="jenis_barangg" id="jenis_barangg" class="form-control" value="{{ $jenis_barangg ??''}}">
    </div>
</div>

<div class="form-group">
    <label for="nama_pembeli" class="col-sm-2 control-label">Pembeli</label>
    <div class="col-sm-10">
        <input type="text" name="nama_pembeli" id="nama_pembeli" class="form-control" value="{{ $nama_pembeli ??''}}">
    </div>
</div>

<div class="form-group">
    <label for="harga_barangg" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
        <input type="text" name="harga_barangg" id="harga_barangg" class="form-control" value="{{ $harga_barangg ??''}}">
    </div>
</div>

<div class="form-group">
    <label for="jumlah_barangg" class="col-sm-2 control-label">Jumlah</label>
    <div class="col-sm-10">
        <input type="text" name="jumlah_barangg" id="jumlah_barangg" class="form-control" value="{{ $jumlah_barangg ??''}}">
    </div>
</div>

<div class="form-group">
    <label for="tgl_pembelian" class="col-sm-2 control-label">Tanggal Pembelian</label>
    <div class="col-sm-3">
        <input type="date" class="form-control datepicker" autocomplete="off" id="date" name="tgl_pembelian">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
        <a href="{{ route ('penjualan.index') }}" class="btn btn-primary" role="button">Batal</a>
    </div>
</div>