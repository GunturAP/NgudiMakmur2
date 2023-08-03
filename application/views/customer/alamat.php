<!-- Page Content -->
< <div class="best-features about-features">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                    <h2> Alamat Pengiriman</h2>
                </div>
            </div>

            <div class="col-md-8 ">
                <?php if ($alamat) {
                ?>

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
                            <td> <?= $alamat['kota_kab']; ?></td>
                        </tr>

                        <tr>
                            <td> &nbsp; &nbsp; &nbsp; Kecamatan </td>
                            <td> : </td>
                            <td> <?= $alamat['kecamatan']; ?></td>
                        </tr>
                        <tr>
                            <td valign="top"> &nbsp; &nbsp; &nbsp; Detail Lainnya </td>
                            <td valign="top"> : </td>
                            <td> <?= $alamat['detail_lainnya']; ?></td>
                        </tr>
                        <tr>
                            <td> Nomor Telepon </td>
                            <td> : </td>
                            <td> +62 <?= $alamat['no_telepon']; ?></td>
                        </tr>

                    </table>
            </div>
            <div class="col-md-3">
                <ul>
                    <li><span style="font-size: 12px; color: Dodgerblue;">
                            <a href="<?= base_url('customer/edit_alamat') ?>" class="filled-button"><i class="fa fa-pencil"> </i> Ubah Alamat</a>
                        </span>
                    </li>
                </ul>
            </div>
        <?php
                } else {
        ?>
            <h4>Silahkan Lengkapi Alamat Pengiriman Anda</h4>
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

    </div>
    </div>