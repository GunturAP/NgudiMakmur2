<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
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
                if ($ajuan) {
                ?>
                <div class="card-header border-0">
                    <h3 class="mb-0">Data Ajuan Pengguna Menjadi Penjual</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="ajuan">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Email</th>
                                <th scope="col" class="sort" data-sort="budget">Mengajukan Sejak</th>
                                <th scope="col" class="sort" data-sort="budget">Data</th>
                                <th scope="col" class="sort" data-sort="status">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                                $count = 0;
                                foreach ($ajuan as $row) {
                                    $count = $count + 1;

                                ?>
                            <tr valign="center">
                                <td scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> <?= $row->email ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="budget">
                                    <?= date('d-m-Y ', $row->date) ?>
                                </td>
                                <td class="budget">
                                    <a href="#" data-toggle="modal" data-target="#dataModal<?= $row->id ?>"
                                        class=" dropdown-item">
                                        <i class="ni ni-align-left-2"></i>
                                        <span> &nbsp; Lihat Data</span>
                                    </a>

                                    <!-- lihat data  Modal-->
                                    <div class="modal fade" id="dataModal<?= $row->id ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Informasi Data
                                                    </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php

                                                            $dt['row'] = $this->db->get_where('data_penjual', ['email' => $row->email])->row_array();
                                                            ?>

                                                    <table>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td><?= $dt['row']['email'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nik</td>
                                                            <td><?= $dt['row']['nik'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Penjual</td>
                                                            <td><?= $dt['row']['nama_penjual'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kelompok Tani</td>
                                                            <td><?= $dt['row']['kelompok_tani'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kota</td>
                                                            <td><?= $dt['row']['kota_kab'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kecamatan</td>
                                                            <td><?= $dt['row']['kecamatan'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Detail Lainnya</td>
                                                            <td><?= $dt['row']['detail_lainnya'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor WA</td>
                                                            <td>+62 <?= $dt['row']['no_telepon'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Foto KTP</td>
                                                            <td><img width="200px"
                                                                    src="<?= base_url('assets/img/profile/ktp/') ?><?= $dt['row']['foto'] ?>">
                                                            </td>
                                                        </tr>
                                                    </table>

                                                    ----
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn  btn-primary" type="button"
                                                        data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>

                                    <a href="<?= base_url('superadmin/accdata'); ?>/<?php echo $row->id ?>"
                                        class="btn btn-success mt-1">
                                        <div>
                                            <i class="ni ni-check-bold text-warning"></i>

                                            <span>Konfirmasi Data</span>
                                        </div>
                                    </a>
                                </td>

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
                    <h3 class="mb-0">Tidak Ada Ajuan Data</h3>

                </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <script>
    <?php
        date_default_timezone_set('Asia/Jakarta');
        ?>
    $(document).ready(function() {
        $('#ajuan').DataTable({
            dom: 'Bfrtip',
            columnDefs: [{
                targets: -1,
                className: 'dt-center'
            }],
            buttons: [{
                text: ' <i class="ni  ni-collection"> </i> &nbsp; Excel',
                extend: 'excel',
                pageSize: 'A4',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                },
                title: 'Laporan Data penhajuan <?= date('d-m-y') ?>',
                className: 'btn btn-default',
            }],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
    </script>