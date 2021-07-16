{{ csrf_field() }}

<div class="form-group">
    <label for="nama_pegawai" class="col-sm-2 control-label">Nama Pegawai</label>
    <div class="col-sm-10">
        <input type="text" name="nama_pegawai" class="form-control" value="{{ $nama_pegawai ?? '' }}">
    </div>
</div>

<div class="form-group">
    <label for="no_hp" class="col-sm-2 control-label">No Handphone</label>
    <div class="col-sm-10">
        <input type="text" name="no_hp" class="form-control" value="{{ $no_hp ?? '' }}">
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-success btn-md" name="simpan" value="Simpan">
        <a href="{{ route('pegawai.index') }}" class="btn btn-primary" role="button">Batal</a>
    </div>
</div>