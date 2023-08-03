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
                        <h2>Tambah Alamat</h2>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="contact-form">
                        <form method="post" action="<?= base_url('customer/edit_alamat'); ?>">
                            <div class="row">
                                <input name="email" type="text" class="form-control" id="id" hidden value="<?= $info['email'] ?>">
                                <div class="col-md-3">
                                    Nama Penerima
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Penerima" required="" value="<?= $alamat['nama_penerima'] ?>">
                                    </fieldset>
                                </div>
                                <div class="col-md-3">
                                    Kota / Kab
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12">
                                    <fieldset>
                                        <select id="id_kota" name="id_kota" class="form-control">
                                            <option value="<?= $alamat['id_kota'] ?>"><?= $alamat['kota_kab'] ?></option>
                                            <?php
                                            if ($kota['rajaongkir']['status']['code'] == '200') {
                                                foreach ($kota['rajaongkir']['results'] as $kt) {
                                                    echo "<option id='id_kt_$kt[city_id]' value='$kt[city_id]'> $kt[type] $kt[city_name] </option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                        <input name="kota" type="text" class="form-control" id="kota" placeholder="Nama  Kota" required="" value="<?= $alamat['kota_kab'] ?>" hidden>

                                    </fieldset>
                                </div>
                                <div class=" col-md-3">
                                    Kecamatan
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="kecamatan" type="text" class="form-control" id="email" placeholder="Nama Kecamatan" required="" value="<?= $alamat['kecamatan'] ?>">
                                    </fieldset>
                                </div>
                                <div class=" col-md-3">
                                    Detail Lainnya
                                </div>
                                <div class="col-lg-9 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="detail_lainnya" type="text" class="form-control" id="email" placeholder="Nama Jalan, Rt/Rw , Nomor Rumah" required="" value="<?= $alamat['detail_lainnya'] ?>">
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
                                        <input name="no_tlp" type="text" class="form-control" id="no_telp" placeholder="Nomor Whatsapp" value="<?= $alamat['no_telepon'] ?>">
                                    </fieldset>
                                </div>

                                <div class=" col-lg-9">
                                    <fieldset>
                                        <button type="submit" class="filled-button">Simpan Alamat</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>