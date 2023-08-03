<!-- Main content -->
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">


        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary border-0 ">
                    <div class="card-header bg-transparent pb-3">
                        <center>
                            <h3>Kata Sandi Baru</h3>
                            <h3><?= $this->session->userdata('reset_email') ?></h3>
                        </center>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">

                        <?= $this->session->flashdata('msg'); ?>
                        <form role="form" method="post" action="<?= base_url('auth/gantipassword'); ?>">
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Password" type="password" name="password1">
                                </div>
                                <div class="text-muted font-bold"><small> <span class="text-danger font-weight-700"><?= form_error('password1'); ?></span></small></div>
                            </div>

                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Ketik Ulang Password" type="password" name="password2">
                                </div>

                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-warning my-4">Reset Kata Sandi</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                    </div>
                    <div class="col-6 text-right">
                        <a href="<?php echo base_url('index.php/auth'); ?>" class="text-light"><small>Kembali </small></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->