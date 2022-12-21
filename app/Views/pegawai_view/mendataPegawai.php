<?= $this->extend('pegawai_view/pegewaiTemplate'); ?>
<?= $this->section('content'); ?>
<div class="row mb-4 mt-5">
    <button type="button" class="btn btn-success mr-4">Download format Excel</button>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFile">Upload format Excel</button>
</div>

<div class="row mb-4 mt-4">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalFoto">Upload Foto</button>
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




<div class="row">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $d) : ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?= $d['nama']; ?></td>
                    <td><?= $d['foto']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning">
                            <a href="" class="fa fa-pen" style="color:white;text-decoration:none;"></a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<!-- modal -->
<form action="/pegawaiFoto" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama pemilik foto" autofocus>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="foto">
                            <label class="custom-file-label" for="foto">Upload foto...</label>
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

<form action="/pegawaiFormat" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="modalFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Data Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="docJwb" id="docJwb">
                            <label class="custom-file-label" for="docJwb">Upload format...</label>
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