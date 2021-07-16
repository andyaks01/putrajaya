{{ csrf_field() }}

<div class="form-group">
    <label for="nama_barang" class="col-sm-2 control-label">Nama Barang</label>
    <div class="col-sm-10">
        <input type="text" name="nama_barang" class="form-control" autocomplete="off" value="{{ $nama_barang ?? '' }}">
    </div>
</div>

<div class="form-group">
    <label for="jenis_barang" class="col-sm-2 control-label">Jenis Barang</label>
    <div class="col-sm-10">
        <input type="text" name="jenis_barang" class="form-control" autocomplete="off" value="{{ $jenis_barang ?? '' }}">
    </div>
</div>

<div class="form-group">
    <label for="merk_barang" class="col-sm-2 control-label">Merk Barang</label>
    <div class="col-sm-10">
        <input type="text" name="merk_barang" class="form-control" autocomplete="off" value="{{ $merk_barang ?? '' }}">
    </div>
</div>

<div class="form-group">
    <label for="jumlah_barang" class="col-sm-2 control-label">Jumlah Barang</label>
    <div class="col-sm-10">
        <input type="text" name="jumlah_barang" class="form-control" autocomplete="off" value="{{ $jumlah_barang ?? '' }}">
    </div>
</div>

<div class="form-group">
    <label for="harga_barang" class="col-sm-2 control-label">Harga Barang</label>
    <div class="col-sm-10">
        <input type="text" name="harga_barang" class="form-control" autocomplete="off" value="{{ $harga_barang ?? '' }}">
    </div>
</div>

<div class="form-group">
    <label for="kondisi_barang" class="col-sm-2 control-label">Kondisi Barang</label>
    <select type="text" name="kondisi_barang" class="form-control" value="{{ $kondisi_barang ?? '' }}">
        <option selected>Pilih..</option>
        <option value="Baru">Baru</option>
        <option value="Bekas">Bekas</option>
    </select>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
        <a href="{{ route('barang.index') }}" class="btn btn-primary" role="button">Batal</a>
    </div>
</div>