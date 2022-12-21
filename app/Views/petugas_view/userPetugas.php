<?= $this->extend("petugas_view/template"); ?>
<?= $this->section("content"); ?>

<div class="accordion" id="accordionExample">
    <?php foreach ($pgw as $p) : ?>
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" style="text-decoration:none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Pendata dari <?= $p->nama; ?>
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">Nama</div>
                        <div class="col-8">: <?= $p->namaPegawai; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-3">NIK</div>
                        <div class="col-8">: <?= $p->no_identitas; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-3">Jenis Kelamin</div>
                        <div class="col-8">: <?= $p->JK; ?></div>
                    </div>

                    <!-- <div class="row">
                            <div class="col-3">Email</div>
                            <div class="col-8">:  </div>
                        </div> -->
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>


<?= $this->endSection(); ?>