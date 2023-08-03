<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Pesanan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">

                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <?php
                if ($pesanan) {
                ?>
                <div class="card-header border-0">
                    <h3 class="mb-0">Pesanan Baru</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="pesanan">
                        <thead class="thead-light">
                            <tr>
                                <th>Id Pesanan</th>
                                <th>Nama Pemesan</th>
                                <th>Jenis Kedelai</th>
                                <th>Jumlah Pesanan</th>
                                <th>Alamat Pengiriman</th>
                                <th>Status Pesanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                                foreach ($pesanan as $row) {
                                    $count = $count + 1;

                                ?>
                            <tr valign="center">
                                <td>
                                    <span class="name mb-0 text-sm"> <?= $row->id_pesanan ?></span>

                                </td>
                                <td>
                                    <?= $row->nama_penerima ?>
                                </td>
                                <td>
                                    <?= $row->nama_kedelai ?>
                                </td>
                                <td>
                                    <?= $row->jumlah ?> Kg
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#dataModal<?= $row->id_pesanan ?>"
                                        class=" dropdown-item">
                                        <i class="ni ni-align-left-2"></i>
                                        <span> &nbsp; Lihat Alamat </span>
                                    </a>

                                    <!-- lihat data  Modal-->
                                    <div class="modal fade" id="dataModal<?= $row->id_pesanan ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Alamat Pengiriman
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table align-items-center table-flush">
                                                        <thead class="thead-light">

                                                        </thead>
                                                        <tbody class="list">
                                                            <tr>
                                                                <td width="20px">Jasa Pengiriman</td>
                                                                <td width="5px"> : </td>
                                                                <td>
                                                                    <?= $row->jasa_pengiriman ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alamat Penerima</td>
                                                                <td> : </td>
                                                                <td>
                                                                    <?= $row->alamat_penerima ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nomor Hp Penerima</td>
                                                                <td> : </td>
                                                                <td>
                                                                    0<?= $row->no_telepon ?> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                </div>

                                                <div class=" modal-footer">
                                                    <button class="btn  btn-primary" type="button"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>



                                <?php
                                        if ($row->status == '1') {
                                        ?>
                                <td>
                                    Menunggu Pembayaran Pembeli
                                </td>
                                <td>
                                    <button disabled class="btn  btn-secondary" type="button">Menunggu
                                        Pembayaran</button>
                                </td>
                                <?php
                                        } elseif ($row->status == '2') {
                                        ?>
                                <td>
                                    Sudah di Bayar
                                    <a href="#" data-toggle="modal" data-target="#fotoModal<?= $row->id_pesanan ?>">

                                        <span> &nbsp; Lihat Bukti </span>
                                    </a>

                                    <!-- lihat foto Modal-->
                                    <div class="modal fade" id="fotoModal<?= $row->id_pesanan ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Bukti Pembayaran
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <img src="<?= base_url('assets/img/bukti/') ?><?= $row->foto ?>">

                                                </div>

                                                <div class=" modal-footer">
                                                    <button class="btn  btn-primary" type="button"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn  btn-success" type="button" data-toggle="modal"
                                        data-target="#prosesModal<?= $row->id_pesanan ?>">Proses Pesanan</button>
                                    <!-- prosess Modal-->
                                    <div class="modal fade" id="prosesModal<?= $row->id_pesanan ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Apakah Anda Akan
                                                        Memproses Pesanan <?= $row->id_pesanan ?> </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                </div>

                                                <div class=" modal-footer">
                                                    <button class="btn  btn-danger" type="button" data-toggle="modal"
                                                        data-target="#tolakModal<?= $row->id_pesanan ?>">Tolak
                                                        Pesanan</button>
                                                    <a class="btn btn-secondary"
                                                        href="<?php echo base_url('admin/alamat_pdf'); ?>/<?= $row->id_pesanan ?>">Cetak
                                                        Alamat (Pdf)</a>
                                                    <a class="btn btn-success"
                                                        href="<?php echo base_url('admin/proses_pesanan'); ?>/<?= $row->id_pesanan ?>">Proses
                                                        Pesanan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="tolakModal<?= $row->id_pesanan ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Apakah Anda ingin
                                                        Menolak <br>dan menghapus Pesanan <br> <?= $row->id_pesanan ?>
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                </div>

                                                <div class=" modal-footer">
                                                    <a class="btn btn-danger"
                                                        href="<?php echo base_url('admin/tolak_pesanan'); ?>/<?= $row->id_pesanan ?>">
                                                        Ya ! Tolak Pesanan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <?php
                                        }
                                        ?>



                            </tr>
                            <?php
                                }
                                ?>

                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->
                <?php
                } else {
                ?>
                <div class="card-header border-0">
                    <h3 class="mb-0">Tidak Ada Pesanan Baru</h3>

                </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Dark table -->
    <script>
    <?php
        date_default_timezone_set('Asia/Jakarta');
        ?>
    $(document).ready(function() {
        $('#pesanan').DataTable({

            columnDefs: [{
                targets: -1,
                className: 'dt-center'
            }],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: false
        });
    });
    </script>