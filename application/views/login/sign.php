<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
    <div class="container">
        <div class="header-body text-center mb-3">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                    <h1 class="text-white">Daftar Akun Baru</h1>
                    <p class="text-lead text-white">Untuk mengakses Website Persediaan Kedelai Silahkan Daftar Dahulu</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card bg-secondary border-0">
                <div class="card-header bg-transparent pb-1">
                    <div class="text-center text-muted mb-1">
                        <h3> SILAHKAN MASUKAN DATA DENGAN BENAR </h3>
                    </div>
                </div>
                <div class="card-body px-lg-5 py-lg-5">

                    <form method="post" action="<?= base_url('auth/daftar'); ?>">
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                </div>
                                <input class="form-control" placeholder="Name" type="text" name="name" id="name" value="<?= set_value('name'); ?>" data-toggle="tooltip" data-placement="left" title="Nama Lengkap Anda">
                            </div>
                            <div class="text-muted font-italic"><small> <span class="text-danger font-weight-700"><?= form_error('name'); ?></span></small></div>
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input class="form-control" placeholder="Email" type="email" name="email" id="email" value="<?= set_value('email'); ?> " data-toggle="tooltip" data-placement="left" title="Masukan Email Aktif">

                            </div>
                            <div class="text-muted font-italic"><small> <span class="text-danger font-weight-700"><?= form_error('email'); ?></span></small></div>
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Password" type="password" name="password1" data-toggle="tooltip" data-placement="left" title="Password Minimal 8 Karakter">

                            </div>
                            <div class="text-muted font-bold"><small> <span class="text-danger font-weight-700"><?= form_error('password1'); ?></span></small></div>
                        </div>

                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input class="form-control" placeholder="Ketik Ulang Password" type="password" name="password2" data-toggle="tooltip" data-placement="left" title="Password harus Sama Seperti Sebelumnya">
                            </div>

                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <div class="custom-control custom-control-alternative custom-checkbox">
                                    <input name="setuju" class="custom-control-input" id="customCheckRegister" type="checkbox" required data-toggle="tooltip" data-placement="left" title="Centang Untuk Melanjutkan">
                                    <label class="custom-control-label" for="customCheckRegister">
                                        <span class="text-muted">Saya Setuju dengan <a href="<?= base_url('auth/sk') ?>">Syarat dan Ketentuan</a></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-4">Create account</button>
                        </div>

                    </form>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-6">
                </div>
                <div class="col-6 text-right">
                    <a href="<?php echo base_url('auth'); ?>" class="text-light"><small>Sudah Punya Akun</small></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>