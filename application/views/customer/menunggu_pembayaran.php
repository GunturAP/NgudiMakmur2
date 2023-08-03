<!-- Page Content -->
< <div class="best-features about-features">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                    <center>
                        <h2> Menunggu Pembayaran Pesanan</h2>
                    </center>
                </div>
            </div>
            <div class="col-md-12  ">

                <h4>Hai <?= $info['nama']; ?></h4>
                Terimakasi telah berbelanja
                Kami telah menerima pesanan mu dengan nomor pesanan <b><?= $pesanan->id_pesanan ?></b> , Yuk segera bayar pesananmu

                <br>
                <br>
                <center>
                    <h4>Jumlah yang Harus di bayar</h4>
                    <h2 style="color:mediumblue;">Rp. <?php echo number_format("$pesanan->total_harga", 0, ",", "."); ?> </h2>
                </center>
                <br>
                Berikut adalah nomor rekening pembayarannya :
                <p>

            </div>

            <div class="col-md-2  ">
                <img src="<?php echo base_url('assets/img/bank/'); ?><?= $bank['logo'] ?> ">
            </div>
            <div class="col-md-1  ">
            </div>
            <div class="col-md-9">
                <center>
                    <b>
                        <h2> <?= $bank['no_rekening']; ?>
                    </b> </h2>
                    </b>
                    <p></p>

                    <b>A/N</b> &nbsp; : &nbsp; <?= $bank['nama_rekening'] ?></b>
                </center>
            </div>
        </div>
        <br><br><br>


        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                    <center>
                        <h2> Unggah Bukti Pembayaran</h2>
                    </center>
                </div>
                <h5>Pastikan bukti pembayaran menampilkan</h5>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6  ">

                <ul class="list-group list-group-horizontal">
                    <li><span class="badge badge-primary badge-pill">1</span> &nbsp; Tanggal / Waktu Pengiriman
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <smal>Contoh : Tgl 04/06/2022 Jam 07.24.08</smal>
                    </li>
                    <li><span class="badge badge-primary badge-pill">2</span> &nbsp; Status Berhasil
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <smal>Contoh : Transfer berhasil, Transaksi Berhasil</smal>
                    </li>
                </ul>

                <p>

            </div>
            <div class="col-md-6  ">

                <ul class="list-group list-group-horizontal">
                    <li><span class="badge badge-primary badge-pill">3</span> &nbsp; Detail Penerima
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <smal>Contoh : Transfer Ke Guntur Adi Prasetyo</smal>
                    </li>
                    <li><span class="badge badge-primary badge-pill">4</span> &nbsp; Jumlah Transfer
                        <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <smal>Contoh : Rp. 123.456,00</smal>
                    </li>
                </ul>

                <p>

            </div>

            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <?php echo form_open_multipart('customer/konfirmasi_pembayaran'); ?>
                <table border="2" width="100%" height="100px">
                    <th>
                        <div class="input-group">
                            <input type="text" hidden name="id_pesanan" value="<?= $pesanan->id_pesanan ?>">

                            <div class="custom-file">
                                <input type="file" accept="image/png, image/jpeg, image/jpg" name="foto" required>
                            </div>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-success">Unggah Foto</button>
                            </div>
                        </div>

                    </th>

                </table>

                <?php form_close() ?>

            </div>

        </div>

    </div>
    </div>