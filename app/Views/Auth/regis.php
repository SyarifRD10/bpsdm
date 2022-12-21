<?= $this->extend("Auth/templateAuth"); ?>
<?= $this->section("auth"); ?>

<!-- Outer Row -->
<div class="row justify-content-center mt-5">

    <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="/img/pemprov.png" alt="logo pemprov papua" class="mb-4" width="25%" height="50%">
                                <h1 class="h4 text-gray-900 mb-4">SINGUP LATSAR</h1>
                            </div>

                            <?php if (session()->getFlashdata('errors')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= session()->getFlashdata('errors'); ?>
                                </div>
                            <?php endif; ?>

                            <form class="user" action="/save_user" method="post">
                                <div class="form-group">
                                    <input type="text" name="namaPegawai" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama">
                                </div>

                                <div class="d-flex flex-row justify-content-between form-group">
                                    <div class="form-group mr-4 align-self-center" style="padding-top: 10px;">
                                        <input type="text" name="no_identitas" class="form-control form-control-user" placeholder="NIK">
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <div class="mr-4">
                                            <input class="form-check-input" type="radio" name="JK" id="inlineRadio2" value="Pria">
                                            <label class="form-check-label" for="inlineRadio2">Pria</label>
                                        </div>
                                        <div class="">
                                            <input class="form-check-input" type="radio" name="JK" id="inlineRadio1" value="Wanita">
                                            <label class="form-check-label" for="inlineRadio1">Wanita</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select name="idInstansi" class="form-control text-center">
                                        <option>---- Pilih Instansi ----</option>
                                        <?php foreach ($dataI as $i) : ?>
                                            <option value="<?= $i['idInstansi']; ?>"><?= $i['nama']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <input name="email" type="email" class="form-control form-control-user" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <input name="password" type="password" class="form-control form-control-user" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <input name="repassword" type="password" class="form-control form-control-user" placeholder="Retype Password">
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Signup</button>


                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="/">Have an account? login here!!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>