<?= $this->extend("petugas_view/template"); ?>
<?= $this->section("content"); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Foto</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Pemilik Foto</th>
                        <th>Foto</th>
                        <th>Uploader</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Pemilik Foto</th>
                        <th>Foto</th>
                        <th>Uploader</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($datas as $i) : ?>
                        <tr>
                            <td><?= $i->nama; ?></td>
                            <td><img src="doc/foto/<?= $i->foto; ?>" class="img" alt=""></td>
                            <td>
                                <div><?= $i->email; ?></div>
                            </td>
                            <td class="inertable">
                                <a href="/doc/foto/<?= $i->foto; ?>" download class="btn btn-primary mx-auto" style="margin-top: 2em;">Download Gambar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Foto</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Uploader</th>
                        <th>Dokumen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Uploader</th>
                        <th>Dokumen</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($datass as $i) : ?>
                        <tr>
                            <td><?= $i->email; ?></td>
                            <td style="text-align: center;"><img src="/doc/dataPGW/<?= $i->data_jwb; ?>" alt=""><i class="fas fa-file-excel" style="font-size: 25px;"></i></td>
                            <td class="inertable">
                                <a href="/doc/dataPGW/<?= $i->data_jwb; ?>" download class="btn btn-primary mx-auto">Download Dokumen</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>