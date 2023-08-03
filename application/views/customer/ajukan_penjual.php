<!-- Page Content -->
< <div class="best-features about-features">
    <?php

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=11",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: bbca5a0beaded406986eaf74784ffae5"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $kota = json_decode($response, true);
    }
    ?>
    <div class="send-message">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-heading">
                        <h2> Formulir ajukan menjadi penjual </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">

                            <h3> Data Diri Penjual</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="contact-form">
                        <?php echo form_open_multipart('Customer/form_ajuan'); ?>
                        <div class="row">
                            <input name="id" type="text" class="form-control" id="id" hidden value="<?= $info['id'] ?>">
                            <div class="col-md-3">
                                Email
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" class="form-control" id="email" placeholder="E-Mail Address" readonly required="" value="<?= $info['email'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Nomor Identitas Kependudukan
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="nik" type="text" class="form-control" id="nama" placeholder="NIK" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Nama Lengkap Penjual
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Full Name" required="" value="<?= $info['nama'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Kelompok Tani
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="kelompok_tani" type="text" class="form-control" placeholder="Nama Kelompok Tani ( Jika Ada )">
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
                                    <input name="no_tlp" type="text" class="form-control" id="no_telp" placeholder="Nomor Whatsapp" value="<?= $info['no_telephone'] ?>">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Foto KTP
                            </div>
                            <div class="col-lg-9">
                                <fieldset>
                                    <input type="file" name="foto" class="form-control" id="foto" accept="image/png, image/jpeg, image/jpg" alt="default.jpg" required></input>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <br> <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h3> Alamat Penjual</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-md-3">
                                Kota / Kab
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <select id="id_kota" name="id_kota" class="form-control">
                                        <option value="">Pilih Kota</option>
                                        <?php
                                        if ($kota['rajaongkir']['status']['code'] == '200') {
                                            foreach ($kota['rajaongkir']['results'] as $kt) {
                                                echo "<option id='id_kt_$kt[city_id]' value='$kt[city_id]'> $kt[type] $kt[city_name] </option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                    <input name="kota" type="text" class="form-control" id="kota" placeholder="Nama Kota" hidden>
                                </fieldset>
                                <br>
                            </div>
                            <div class="col-md-3">
                                Kecamatan
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="kecamatan" type="text" class="form-control" id="kecamatan" placeholder="Nama Kecamatan" required="">
                                </fieldset>
                            </div>
                            <div class=" col-md-3">
                                Detail Lainnya
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="detail_lainnya" type="text" class="form-control" id="email" placeholder="Nama Jalan, Rt/Rw , Nomor Rumah" required="" </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
                <br> <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">

                            <h3> Data Rekening Penjual</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="contact-form">
                        <div class="row">
                            <div class="col-md-3">
                                Nama Bank
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <select id="nama_bank" name="nama_bank" class="form-control" required>
                                        <option>Pilih Nama Bank</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BTN">BTN</option>
                                        <option value="MANDIRI">MANDIRI</option>
                                        <option value="BRI">BRI</option>
                                        <option value="BANK JATIM">BANK JATIM</option>
                                    </select>
                                </fieldset>

                                <br>
                            </div>
                            <div class="col-md-3">
                                Nama Di Rekening
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="nama_rekening" type="text" class="form-control" id="nama_rekening" placeholder="Nama Anda di Buku Rekening" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-3">
                                Nomor Rekening
                            </div>
                            <div class="col-lg-9 col-md-12 col-sm-12">
                                <fieldset>
                                    <input name="nomor_rekening" type="text" class="form-control" id="nomor_rekening" placeholder="Nomor Rekening " required="">
                                </fieldset>
                            </div>

                            <div class=" col-lg-12">
                                <div class="float-xl-right">
                                    <fieldset>
                                        <button type="submit" class="filled-button">Ajukan Saya Sebagai Penjual</button>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <?php form_close(); ?>
                    </div>
                </div>
            </div>
        </div>