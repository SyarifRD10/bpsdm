<form method="post" id="editForm" enctype="multipart/form-data" action="/update_foto">
    <?= csrf_field() ?>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label>Nama File</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $fot['nama'] ?>" required>
            </div>
            <div class="form-group">
                <label>File</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="iddata_foto" id="iddata_foto" value="<?= $fot['iddata_foto'] ?>">
            <!-- <input type="submit" name="submit" id="submit" class="btn btn-info" value="Simpan"> -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>


</form>