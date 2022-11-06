<?= $this->extend('pegawai_view/pegewaiTemplate'); ?>
<?= $this->section('content'); ?>
<div class="row mb-4 mt-5">
    <button type="button" class="btn btn-success mr-4">Download format Excel</button>

    <button type="file" class="btn btn-primary">Upload format Excel</button>
</div>

<div class="row mb-4 mt-4">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Upload Foto</button>
</div>

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
                    <td><?= $d['nama_pegawai']; ?></td>
                    <td></td>
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
<form action="/save" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label autofocus>Nama</label>
                        <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama pemilik foto" autofocus>
                    </div>
                    <!-- <div class="form-group">
                        <label for="exampleFormControlFile1">Foto</label>
                        <input type="file" class="form-control-file">
                    </div> -->

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