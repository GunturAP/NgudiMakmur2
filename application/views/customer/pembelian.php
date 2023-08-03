<!-- Page Content -->
< <div class="best-features about-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2> Konfirmasi Pembelian</h2>
            </div>
            <br><br>
            <br>

            <div class="col-md-12">
                <div class="section-heading">

                    <h3> Alamat Pengiriman</h3>
                </div>
            </div>
            <?php if ($alamat) {
            ?>
                <div class="col-md-8 ">

                    <table>
                        <tr>
                            <td width="150px"> Nama Penerima </td>
                            <td width="20px"> : </td>
                            <td><?= $alamat['nama_penerima']; ?></td>
                        </tr>
                        <tr>
                            <td> Alamat </td>
                            <td> </td>
                            <td> </td>
                        </tr>

                        <tr>
                            <td>
                                &nbsp; &nbsp; &nbsp; Kota / Kab.
                            </td>
                            <td> : </td>
                            <td><?= $alamat['kota_kab'];  ?></td>
                        </tr>

                        <tr>
                            <td> &nbsp; &nbsp; &nbsp; Kecamatan </td>
                            <td> : </td>
                            <td> <?= $alamat['kecamatan'];  ?></td>
                        </tr>
                        <tr>
                            <td valign="top"> &nbsp; &nbsp; &nbsp; Detail Lainnya </td>
                            <td valign="top"> : </td>
                            <td> <?= $alamat['detail_lainnya'];  ?></td>
                        </tr>
                        <tr>
                            <td> Nomor Telepon </td>
                            <td> : </td>
                            <td> +62 <?= $alamat['no_telepon'];  ?></td>
                        </tr>

                    </table>
                    <?php
                    $temp = array();
                    ?>

                </div>
                <div class="col-md-3">
                    <ul>
                        <li><span style="font-size: 12px; color: Dodgerblue;">
                                <a href="<?= base_url('customer/edit_alamat') ?>/<?php echo $detail_produk->id ?>" class=" filled-button"><i class="fa fa-pencil"> </i> Ubah Alamat</a>
                            </span>
                        </li>
                    </ul>
                </div>

            <?php
            } else {
            ?>
                <div class="col-md-12">

                    <h4>Silahkan Lengkapi Alamat Pengiriman Anda !!! </h4>
                </div>
                <div class="col-md-12">
                    <div class="float-xl-right">
                        <ul>
                            <li><span style="font-size: 12px; color: Dodgerblue;">
                                    <a href="<?= base_url('customer/tambah_alamat') ?>" class="filled-button"><i class="fa fa-pencil"> </i> Tambahkan Alamat</a>
                                </span>
                            </li>
                        </ul>
                    </div><br>
                </div>
            <?php
            }

            ?>




        </div>
        <br> <br>
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">

                    <h3> Produk yang di beli</h3>
                </div>
            </div>
            <div class="col-md-3">
                <?php
                $ft = unserialize($detail_produk->foto_kedelai);
                ?>
                <div>
                    <img src="<?= base_url('assets/img/produk/'); ?><?= $ft['0'] ?>" alt="">
                </div>
            </div>
            <div class="col-md-9">
                <div class="left-content">
                    <h3>Rp. <?php echo number_format("$detail_produk->harga", 0, ",", "."); ?> <small> / Kg</small> </h3>
                    <input id="harga_produk" hidden value="<?= $detail_produk->harga ?>">

                    <p>
                    <table>
                        <tr>
                            <td width="150px"> Nama Petani </td>
                            <td width="20px"> : </td>
                            <td><?= $detail_produk->nama_petani ?></td>
                        </tr>
                        <tr>
                            <td> Jenis Kedelai </td>
                            <td> : </td>
                            <td> Untuk <?= $detail_produk->jenis_kedelai ?></td>
                        </tr>
                        <tr>
                            <td> Varietas Kedelai </td>
                            <td> : </td>
                            <td> <?= $detail_produk->varietas_kedelai ?></td>
                        </tr>
                        <tr>
                            <td> Grade </td>
                            <td> : </td>
                            <td> <?= $detail_produk->grade ?></td>
                        </tr>
                        <tr>
                            <td> Stok Kedelai </td>
                            <td> : </td>
                            <td> <?= $detail_produk->stok ?> Kg</td>
                        </tr>
                        <tr>
                            <td valign="top"> Deskripsi </td>
                            <td valign="top"> : </td>
                            <td> <?= $detail_produk->info_lain ?></td>
                        </tr>

                    </table>

                    </p>
                    <div class="row">
                        <div class="col-sm-4 mx-auto">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <button type="button" class="btn btn-outline-secondary btn-number" data-type="minus" data-field="quant[1]">
                                        <span class="fa fa-minus"></span>
                                    </button>
                                </span>
                                <input type="text" name="quant[1]" id="banyak" onchange="total()" class="form-control input-number" value="0" min="1" max="<?= $detail_produk->stok ?>">
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary btn-number" data-type="plus" data-field="quant[1]">
                                        <span class="fa fa-plus"></span>
                                    </button>
                                </span>
                                <div style="font-size: 25px;">
                                    &nbsp; Kg
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br> <br>
        <br> <br>
        <div class="row">

            <div class="col-md-7">
                <div class="section-heading">

                    <h3> Total Pesanan </h3>

                </div>
            </div>


            <div class="col-sm-5">

                <div class="section-heading">
                    <h3>
                        <div id="total_pesanan"> 0</div>
                    </h3>
                </div>
            </div>


        </div>
        <div class="row">

            <div class="col-md-7">
                <div class="section-heading">

                    <h3> Jasa Pengiriman </h3>

                </div>
            </div>


            <div class="col-sm-5">

                <div class="section-heading">
                    <h3>
                        <div id="total_pesanan">
                            <select id="jasa_pengiriman" name="jasa_pengiriman" class="form-control" onchange="jasa()" required>

                                <option>
                                    Pilih Jasa Pengiriman
                                </option>
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS INDONESIA</option>
                            </select>
                            <form action="" method="post" id="form">
                                <input type="hidden" name="jasa_pengiriman" id="input_jasa" ">
                            </form>
                        </div>
                    </h3>
                </div>
            </div>


        </div>
        <?php
        if ($alamat) {
            if (isset($_POST['jasa_pengiriman'])) {
                $jasa = $_POST['jasa_pengiriman'];
                $id_asal = $alamat['id_kota'];
                $id_tujuan = $alamat_penjual['id_kota'];

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "origin=" . $id_asal . "&destination=" . $id_tujuan . "&weight=1000&courier=" . $jasa,
                    CURLOPT_HTTPHEADER => array(
                        "content-type: application/x-www-form-urlencoded",
                        "key: bbca5a0beaded406986eaf74784ffae5"
                    ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    $harga_ongkir = json_decode($response, true);
                }
        ?>



                <?php
                if ($harga_ongkir['rajaongkir']['status']['code'] == '200') {
                    $status['hsl'] =  $harga_ongkir['rajaongkir']['results']['0']['costs']['0'];
                }
                ?>


                <div class=" row">

                                <div class="col-md-6">
                                    <div class="section-heading">

                                        <h3> Biaya Pengiriman ( <?= $jasa ?> ) <small>Ke Alamat Anda </small> </h3>

                                    </div>
                                </div>

                                <div class="col-md-1">
                                    <div class="section-heading">

                                        <h3>Rp.</h3>

                                    </div>
                                </div>
                                <div class="col-sm-2">

                                    <div class="section-heading">
                                        <h3>
                                            <div id="hrgongkir"> <?= $status['hsl']['cost']['0']['value'] ?> </div>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <div class="section-heading">
                                        <h3> <small> Per Kg </small> </h3>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="left-content">
                                        <table>
                                            <tr>
                                                <td> Jenis Layanan </td>
                                                <td> : </td>
                                                <td><?= $status['hsl']['description'] ?> </td>
                                            </tr>
                                            <tr>
                                                <td> Estimasi Pengiriman </td>
                                                <td> : </td>
                                                <td><?= $status['hsl']['cost']['0']['etd'] ?> Hari</td>
                                            </tr>
                                            <tr>
                                                <td width="40%"> Dikirim Dari </td>
                                                <td width="20px"> </td>
                                            </tr>
                                            <tr>
                                                <td> Kota / Kab </td>
                                                <td> : </td>
                                                <td><?= $alamat_penjual['kota_kab']; ?></td>
                                            </tr>
                                            <tr>
                                                <td> Kecamatan </td>
                                                <td> : </td>
                                                <td><?= $alamat_penjual['kecamatan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td valign="top"> Detail </td>
                                                <td valign="top"> : </td>
                                                <td><?= $alamat_penjual['detail_lainnya']; ?></td>
                                            </tr>

                                        </table>

                                        </p>


                                    </div>
                                </div>
                        </div>

                        <br> <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="left-content">
                                    <table width="100%">
                                        <tr>
                                            <td width="65%"> Subtotal Untuk Produk</td>
                                            <td width="3%" align="center">:</td>
                                            <td id="total_pesanan1">0</td>
                                        </tr>
                                        <tr>
                                            <td> Subtotal Untuk Pengiriman </td>
                                            <td align="center"> : </td>
                                            <td id="total1">0</td>
                                        </tr>

                                    </table>

                                    </p>


                                </div>
                            </div>


                            <div class=" col-md-8">
                                <div class="section-heading">

                                    <h3> Total Pembayaran </small> </h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="section-heading">

                                    <h3>
                                        <div id="total">-------</div>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-12">


                                <div class="float-xl-right">
                                    <ul>
                                        <li><span style="font-size: 14px; ">
                                                <a href="#" data-toggle="modal" data-target="#dataModal" class="filled-button"><i class="fa fa-shopping-cart"></i>
                                                    <i class="ni ni-align-left-2"></i>
                                                    <span> &nbsp; Beli Sekarang</span>
                                                </a>

                                            </span>
                                        </li>
                                    </ul>
                                </div>


                                <!-- lihat data  Modal-->
                                <div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Informasi Data Pembelian </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    Apakah anda yakin ingin membeli produk <?= $detail_produk->varietas_kedelai ?>
                                                    <br>
                                                    dengan alamat tujuan <?= $alamat['kota_kab'];  ?>, <?= $alamat['kecamatan'];  ?>, <?= $alamat['detail_lainnya'];  ?>
                                                    <br>
                                                    dengan total Pembayaran
                                                    <center>
                                                        <h2 id="modal_total"></h2>
                                                    </center>
                                                </p>
                                                <form method="post" action="<?= base_url('customer/checkout'); ?>">
                                                    <input type="text" name="email_pembeli" value="<?= $alamat['email'];  ?>" hidden>
                                                    <input type="text" name="email_penjual" value="<?= $detail_produk->email ?>" hidden>
                                                    <input type="text" name="id_produk" value="<?= $detail_produk->id ?>" hidden>
                                                    <input type="text" name="nama_produk" value="<?= $detail_produk->varietas_kedelai ?> <?= $detail_produk->jenis_kedelai ?>" hidden>
                                                    <input type="number" name="jumlah" id="input_banyak" hidden>
                                                    <input type="number" name="subtotal_pesanan" id="input_pesanan" hidden>
                                                    <input type="number" name="subtotal_pengiriman" id="input_ongkir" hidden>
                                                    <input type="number" name="total_harga" id="input_total" hidden>
                                                    <input type="text" name="jasa_kirim" value="<?= $jasa ?>" hidden>
                                                    <input type="text" name="nama_penerima" value="<?= $alamat['nama_penerima'];  ?>" hidden>
                                                    <input type="text" name="alamat_penerima" value="<?= $alamat['kota_kab'];  ?> , <?= $alamat['kecamatan'];  ?> , <?= $alamat['detail_lainnya'];  ?>" hidden>
                                                    <input type="text" name="no_tlp" value="<?= $alamat['no_telepon'];  ?>" hidden>

                                                    <button class="btn  btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-success" type="submit"> Beli </button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            } else {
                    ?>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="section-heading">
                                <center>
                                    <h3> Lengkapi Alamat Anda </h3>
                                </center>

                            </div>
                        </div>




                    </div>
                <?php

            }

                ?>



                </div>
            </div>