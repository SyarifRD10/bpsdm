<?= $this->extend('pegawai_view/pegewaiTemplate'); ?>
<?= $this->section('content'); ?>


<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
    </div>
<?php endif ?>

<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('errors'); ?>
    </div>
<?php endif ?>
<form action="/pegawaiFoto" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="card mb-4">
        <div class="card-body">
            <div class="col">
                <div class="row block">
                    <input type=" hidden" name="iddata_foto" value="<?= $fot['iddata_foto']; ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama pemilik foto" value="<?= $fot['nama']; ?>" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="foto">
                            <label class="custom-file-label" for="foto">Upload foto...</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="/mendatapgw" type="button" class="btn btn-info">Kembali</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </div>
</form>



<?= $this->endSection(); ?>