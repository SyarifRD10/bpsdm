<?= $this->extend('petugas_view/template'); ?>
<?= $this->section('content'); ?>
<!-- Page Heading -->

<!-- Content Row -->

<div class="row mb-2">
    <div class="col-4">
        <h5>Upload & Delete Format Excel</h5>
    </div>
    <div class="col-8">
        <hr>
    </div>
</div>
<div class="row mb-4">
    <div class="col">
        <button type="button" class="btn btn-info mr-2" data-toggle="modal" data-target="#ModalFormat">Upload Format</button>
        <a href="" class="btn btn-danger"> Hapus Format</a>
    </div>
</div>

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

<div class="row mb-2">
    <div class="col-4">
        <h5>Data Peserta LATSAR</h5>
    </div>
    <div class="col-8">
        <hr>
    </div>
</div>

<div class="row">
    <?php foreach ($inst as $i) : ?>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <?= $i['alamat']; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $i['nama']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>



<!-- modal -->
<form action="/save_d" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <div class="modal fade" id="ModalFormat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Format</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="format">
                            <label class="custom-file-label">Upload format... *</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>