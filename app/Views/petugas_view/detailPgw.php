<?= $this->extend('petugas_view/template'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <img src="/doc/foto/foto bem almet.JPG" alt="" class="img">
                <p class="card-text">Nama pemilik Foto</p>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-doc"></i>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($datas as $d) : ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $d->namaPegawai; ?></h5>
                        <p class="card-text">Nomor Identitas: <?= $d->no_identitas; ?></p>
                        <p class="card-text">Jenis Kelamin: <?= $d->JK; ?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>