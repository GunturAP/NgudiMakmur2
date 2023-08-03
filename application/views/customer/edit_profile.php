<!-- Page Content -->
< <div class="best-features about-features">

    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Edit Data Diri</h2>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="contact-form">
                        <?php echo form_open_multipart('Customer/edit_profile'); ?>
                        <div class="row">
                            <input name="id" type="text" class="form-control" id="id" hidden value="<?= $info['id'] ?>">
                            <input name="foto_lama" type="text" class="form-control" id="id" hidden
                                value="<?= $info['foto'] ?>">
                            <div class="col-md-3">
                                Nama Lengkap
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="nama" type="text" class="form-control" id="nama"
                                        placeholder="Full Name" required="" value="<?= $info['nama'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Email
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="E-Mail Address" readonly required="" value="<?= $info['email'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Nomor Whatsapp
                            </div>
                            <div class="col-sm-1">
                                <input value="+62" readonly>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="no_tlp" type="text" class="form-control" id="no_telp"
                                        placeholder="Nomor Whatsapp" value="<?= $info['no_telephone'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Foto
                            </div>
                            <div class="col-lg-9">
                                <fieldset>
                                    <input type="file" name="foto" rows="6" class="form-control" id="foto"
                                        accept="image/png, image/jpeg, image/jpg" alt="default.jpg"></input>
                                </fieldset>
                            </div>
                            <div class=" col-lg-9">
                                <fieldset>
                                    <button type="submit" class="filled-button">Edit Data Diri</button>
                                </fieldset>
                            </div>
                        </div>
                        <?php form_close(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>