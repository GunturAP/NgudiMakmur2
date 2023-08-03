<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-3">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">Selamat Datang </h1>
                        <p class="text-lead text-white">di Website Persediaan Kedelai Jawa Timur</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-2">
                        <center>

                            <h3>Silahkan Masuk</h3>
                        </center>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>Dengan Email yang sudah terdaftar</small>
                        </div>
                        <?= $this->session->flashdata('msg'); ?>
                        <form role="form" method="post" action="<?= base_url('auth'); ?>">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Email" type="email" name="email" id="email"
                                        value="<?= set_value('email'); ?>">
                                </div>

                                <div class=" text-muted font-italic"><small> <span
                                            class="text-danger font-weight-700"><?= form_error('email'); ?></span></small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" name="password"
                                        id="password">
                                </div>
                                <div class="text-muted font-italic"><small> <span
                                            class="text-danger font-weight-700"><?= form_error('password'); ?></span></small>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <a href="<?php echo base_url('auth/forgot'); ?>" class="text-light"><small>Lupa Kata
                                Sandi?</small></a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="<?php echo base_url('auth/daftar'); ?>" class="text-light"><small>Buat Akun
                                Baru</small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->