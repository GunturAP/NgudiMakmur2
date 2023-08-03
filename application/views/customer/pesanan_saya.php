<!-- Page Content -->
< <div class="best-features about-features">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="section-heading">
                    <center>
                        <h2> Pesanan Saya</h2>
                    </center>
                </div>
            </div>
        </div>
        <?php
        $count = 0;
        foreach ($kedelai as $row) {
            $count = $count + 1;

        ?>
            <div class="row">
                <div class="col-md-3">
                    <div>
                        <?php
                        $ft = unserialize($row->foto_kedelai);
                        ?>
                        <img src="<?= base_url('assets/img/produk/'); ?><?= $ft['0'] ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h3>
                            Id Pesanan : <?= $row->id_pesanan ?>
                        </h3>
                        <p>
                        <table>
                            <tr>
                                <td width="160px"> Nama Penerima </td>
                                <td width="20px"> : </td>
                                <td><?= $row->nama_penerima ?></td>
                            </tr>
                            <tr>
                                <td> Jumlah </td>
                                <td> : </td>
                                <td><?= $row->jumlah ?> Kg</td>
                            </tr>
                            <tr>
                                <td> Total Pembayaran </td>
                                <td> : </td>
                                <td> Rp. <?php echo number_format("$row->total_harga", 0, ",", "."); ?></td>
                            </tr>
                            <tr>
                                <td valign="top"> Status </td>
                                <td valign="top"> : </td>
                                <td> <b>
                                        <?php
                                        if ($row->status == '1') {
                                            echo "Menunggu Pembayaran";
                                        } elseif ($row->status == '2') {
                                            echo "Menunggu Di Proses Penjual";
                                        } elseif ($row->status == '3') {
                                            echo "Sedang Di Proses Penjual";
                                        } elseif ($row->status == '4') {
                                            echo "Dalam Pengiriman <br> No. resi : " . $row->no_resi;
                                        } elseif ($row->status == '5') {
                                            echo "Pesanan Diterima";
                                        } elseif ($row->status == '6') {
                                            echo '<div style="color: darkred;"> Pesanan Di Tolak</div> ';
                                        }
                                        ?>
                                    </b></td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="col-md-3">
                    <table height="100%" width="100%">
                        <th>
                            <div class="col text-center">
                                <?php
                                if ($row->status == '1') {
                                ?>

                                    <a class="btn  btn-secondary" href="<?= base_url('customer/menunggu_pembayaran') ?>/<?= $row->id_pesanan ?>" type="button">Unggah Bukti Pembayaran</a>
                                    <?php
                                } elseif ($row->status == '2') {
                                    echo '<button class="btn  btn-primarry" type="button" disabled >Pembayaran di Konfirmasi</button>';
                                } elseif ($row->status == '3') {
                                    echo '<button class="btn  btn-primarry" type="button" disabled >Pembayaran di Konfirmasi</button>';
                                } elseif ($row->status == '4') {
                                    //estimasi 3 hari baru bisa di klik 60*60*72
                                    if (time() - $row->date_created > (60 * 3)) {
                                    ?>
                                        <button class="btn  btn-warning" type="button" data-toggle="modal" data-target="#terimaModal<?= $row->id_pesanan ?>">Pesanan Ditermia</button>
                                        <!-- prosess Modal-->
                                        <div class="modal fade" id="terimaModal<?= $row->id_pesanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"> Apakah Pesanan <?= $row->id_pesanan ?> Sudah Anda Terima ? </h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class=" modal-footer">
                                                        <a class="btn btn-success" href="<?php echo base_url('customer/pesanan_diterima'); ?>/<?= $row->id_pesanan ?>">Sudah </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                <?php
                                    } else {
                                        echo '<button class="btn  btn-warning" type="button" disabled >Pesanan Diterima</button>';
                                        echo '<small> Estimasi 2-3 Hari Pengiriman </small>';
                                    }
                                } elseif ($row->status == '5') {
                                    echo '<button class="btn  btn-primarry" type="button" disabled >Pesanan Selesai</button>';
                                } elseif ($row->status == '6') {
                                    echo '<button class="btn  btn-danger" type="button" disabled data-toggle="tooltip" data-placement="top" title="Silahkan Cek Email Anda" >Pesanan Ditolak  </button>';
                                }
                                ?>

                            </div>
                        </th>
                    </table>
                </div>

            </div>
            <p>
                <br> <br>
            <?php
        }
            ?>
    </div>