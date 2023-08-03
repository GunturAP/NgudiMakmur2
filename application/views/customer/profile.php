<!-- Page Content -->
< <div class="best-features about-features">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                    <h2> Data Diri</h2>
                </div>
            </div>

            <div class="col-md-8 ">

                <table>
                    <tr>
                        <td width="200px"> Nama Lengkap </td>
                        <td width="20px"> : </td>
                        <td><?= $info['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>: </td>
                        <td><?= $info['email'] ?> </td>
                    </tr>

                    <tr>
                        <td>
                            Nomor Telepon
                        </td>
                        <td> : </td>
                        <td> (+62) <?= $info['no_telephone'] ?></td>
                    </tr>

                    <tr>
                        <td> Foto Diri </td>
                        <td> : </td>
                        <td> <img width="50px" src="<?= base_url('assets/img/profile/'); ?><?= $info['foto'] ?>" alt="foto"> </td>
                    </tr>
                </table>

            </div>
            <div class="col-md-3">
                <ul>
                    <li><span style="font-size: 12px; color: Dodgerblue;">
                            <a href="<?= base_url('customer/halaman_edit_profile') ?>" class="filled-button"><i class="fa fa-pencil"> </i> Edit Data Diri</a>
                        </span>
                    </li>
                </ul>
            </div>

        </div>
        <br> <br>

    </div>
    </div>