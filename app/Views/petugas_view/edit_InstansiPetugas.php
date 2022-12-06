<?= $this->extend("petugas_view/template"); ?>
<?= $this->section("content"); ?>



<!-- DataTales Example -->
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Instansi</h6>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="POST" class="user" action="/update_inst/<?= $insts['idInstansi']; ?>">
                        <?= csrf_field() ?>
                        <div class="form-group">
                            <label for="nama">Nama Instansi</label>
                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="nama" value="<?= $insts['nama']; ?>" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Instansi</label>
                            <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="alamat" value="<?= $insts['alamat']; ?>">
                        </div>

                        <button class="btn btn-primary btn-user btn-block" type="submit">
                            Save
                        </button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>