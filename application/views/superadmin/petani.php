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
                <div class="card-header border-0">
                    <h3 class="mb-0">Data Penjual</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="petani">
                        <thead class="thead-light">
                            <tr>
                                <th scope="row">Nama</th>
                                <th scope="row">No. Telepon</th>
                                <th scope="row">Alamat</th>
                                <th scope="row">Detail</th>
                                <th scope="row">Foto Profil</th>
                                <th scope="row">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $count = 0;
                            foreach ($data_petani as $row) {
                                $count = $count + 1;
                                $detail=$this->db->get_where('data_penjual',['email'=>$row->email])->row_array();
                                
                            ?>
                            <tr>
                                <td scope="row">
                                    <?= $row->nama ?>
                                </td>
                                <td>
                                    +62<?= $detail['no_telepon']?>
                                </td>
                                <td>
                                    <?= $detail['detail_lainnya'].', '.$detail['kecamatan'].', '.$detail['kota_kab']?>
                                </td>
                                <td>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Informasi Data </h5>
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
                                    <a data-toggle="collapse" href="#ft<?php echo $count ?>"
                                        data-target="#ft<?php echo $count ?>" aria-expanded="false"
                                        aria-controls="ft<?php echo $count ?>">
                                        Lihat Foto</a>
                                    <div class="collapse" id="ft<?php echo $count ?>">
                                        <img class="rounded-image"
                                            src="<?php echo base_url('assets/img/profile/'); ?><?php echo $row->foto; ?>"
                                            width="90px" height="120px" overflow="hidden" border-radius="50%">
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                            <a class="dropdown-item" href="#">Block Akun</a>
                                            <hr class="my-3">
                                            <a class="dropdown-item"
                                                href="<?= base_url('superadmin/delete_penjual') ?>/<?= $row->id ?>">
                                                <p class="text-danger">Hapus</p>
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <!-- Card footer -->

            </div>
        </div>
    </div>
    <!-- Dark table -->
    <script>
    <?php
        date_default_timezone_set('Asia/Jakarta');
        ?>
    $(document).ready(function() {
        $('#petani').DataTable({
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
                title: 'Laporan Data Penjual <?= date('d-m-y') ?>',
                className: 'btn btn-default',
            }],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
    </script>