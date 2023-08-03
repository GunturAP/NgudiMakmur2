<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Riwayat Penjualan</h6>
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
                <div class="card-header">
                    <h4>Pilih Bulan Penjualan</h4>
                    <form action="" method="POST">
                        <div class="form-group row">
                            <div class="col-sm-4 ">
                                <select type="select" id="id_bulan" name="bulan" class="form-control">
                                    <option value="<?php echo date('n') ?>">Bulan Ini</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select name="tahun" id="exampleSelect" class="form-control" required>

                                    <?php
                                    $th = date('Y');

                                    for ($i = $th - 3; $i < $th + 5; $i++) {
                                        # code...
                                        if ($i == $th) {
                                            echo '';

                                            ?>
                                    <option value="<?=$i?>" selected><?=$i?></option>
                                    <?php
                                        } else {
                                                ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <div class="position-relative form-group">
                                    <button class=" btn-transition btn btn-outline-success"> Lihat Data
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if ($pesanan) {
                ?>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="riwayat">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Id Pesanan</th>
                                <th scope="col" class="sort" data-sort="name">Nama Pemesan</th>
                                <th scope="col" class="sort" data-sort="budget">Jenis Kedelai</th>
                                <th scope="col" class="sort" data-sort="budget">Jumlah Pesanan</th>
                                <th scope="col" class="sort" data-sort="status">Alamat Pengiriman</th>
                                <th scope="col" class="sort" data-sort="status">Status Pesanan</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                                $count = 0;
                                foreach ($pesanan as $row) {
                                    $count = $count + 1;

                                ?>
                            <tr valign="center">
                                <td scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> <?= $row->id_pesanan ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="budget">
                                    <?= $row->nama_penerima ?>
                                </td>
                                <td class="budget">
                                    <?= $row->nama_kedelai ?>
                                </td>
                                <td class="budget">
                                    <?= $row->jumlah ?> Kg
                                </td>
                                <td class="budget">
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
                                                                <td width="20px">Nama Penerima</td>
                                                                <td width="5px"> : </td>
                                                                <td>
                                                                    <?= $row->nama_penerima ?>
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

                                <td>
                                    <button disabled class="btn  btn-secondary" type="button">Pesanan Selesai</button>
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
                    <h3 class="mb-0">Belum Ada Riwayat Pesanan</h3>

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
        $('#riwayat').DataTable({
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
                title: 'Laporan Data Riwayat Pesanan <?= date('d-m-y') ?>',
                className: 'btn btn-default',
            }],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
    </script>