<?=$this->extend("Auth/templateAuth");?>
<?=$this->section("auth");?>

<!-- Outer Row -->
<div class="row justify-content-center mt-5">

    <div class="col-xl-4 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <!-- <div class="logo"></div> -->
                                <img src="/img/pemprov.png" alt="logo pemprov papua" class="logo mb-4">
                                <h1 class="h4 text-gray-900 mb-4">LOGIN LATSAR</h1>
                            </div>


                                <?php if (session()->getFlashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">x</button>
                                            <b>Error !</b>
                                            <?=session()->getFlashdata('error')?>
                                        </div>
                                    </div>
                                <?php endif;?>
                            <form method="POST" class="user" action="/process">
                                <?=csrf_field()?>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Enter Email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                                </div>

                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                        Login
                                </button>


                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="/signup">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?=$this->endSection();?>