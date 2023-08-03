<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Produk</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">

                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="<?php echo base_url('Admin/tambah_persediaan'); ?>" class="btn btn-sm btn-neutral">Tambah
                        Data</a>
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
                <div class="card-header border-0">
                    <h3 class="mb-0">Persediaan Kedelai</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="kedelai">
                        <thead class="thead-light">
                            <tr>
                                <th>Varietas Kedelai</th>
                                <th>Jenis Kedelai</th>
                                <th>Harga /kg</th>
                                <th>Grade</th>
                                <th>Stok</th>
                                <th>Foto Kedelai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                          
                            foreach ($kedelai as $row) {
                                $count = $count + 1;

                            ?>
                            <tr>
                                <td>
                                    <?php
                                    if($row->stok <50){
                                    ?>
                                    <span style="color:Orange" class="name mb-0 text-sm" data-toggle="tooltip"
                                        data-placement="top" title="Stok Menipis"><?= $row->varietas_kedelai ?></span>
                                    <?php
                                    }else{
                                    ?>
                                    <span class="name mb-0 text-sm"><?= $row->varietas_kedelai ?></span>
                                    <?php
                                    }
                                    ?>


                                </td>
                                <td>
                                    <?= $row->jenis_kedelai ?>
                                </td>
                                <td>
                                    Rp. <?= $row->harga ?>
                                </td>
                                <td>

                                    <span class="status"> <?= $row->grade ?></span>

                                </td>
                                <td>
                                    <?php
                                    if($row->stok <50){
                                    ?>
                                    <span style="color:Orange" class="name mb-0 text-sm" data-toggle="tooltip"
                                        data-placement="top" title="Stok Menipis"><?= $row->stok ?> Kg</span>
                                    <?php
                                    }else{
                                    ?>
                                    <?= $row->stok ?> Kg
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a data-toggle="collapse" href="#ft<?php echo $count ?>"
                                        data-target="#ft<?php echo $count ?>" aria-expanded="false"
                                        aria-controls="ft<?php echo $count ?>">
                                        Lihat Foto</a>
                                    <div class="collapse" id="ft<?php echo $count ?>">
                                        <div id="produk<?php echo $count ?>" class="carousel slide">
                                            <div class="carousel-inner">
                                                <?php
                                                    $ft = unserialize(
                                                        $row->foto_kedelai
                                                    );

                                                    $countf = 0;
                                                    foreach ($ft as $fot) {

                                                        if ($countf == 0) {
                                                            echo '<div class="carousel-item active">';
                                                        } else {
                                                            echo '<div class="carousel-item">';
                                                        }
                                                        echo '<img  width="150px" heiht="150px" src="' . base_url('assets/img/produk/') . $fot . '" alt="' . $fot . '">';
                                                        echo '</div>';

                                                        $countf = $countf + 1;
                                                    }
                                                    ?>

                                            </div>
                                            <a class="carousel-control-prev" href="#produk<?php echo $count  ?>"
                                                role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#produk<?php echo $count  ?>"
                                                role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('admin/edit_persediaan'); ?>/<?php echo $row->id; ?>">
                                        <i class="fas fa-edit"></i></a>
                                    &nbsp;
                                    <a type="button" data-toggle="modal" data-target="#modal-hapus<?=$count?>">
                                        <i class="fas fa-trash-alt" style="color:red"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal Hapus -->
                            <div class="col-md-4">
                                <div class="modal fade" id="modal-hapus<?=$count?>" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-hapus<?=$count?>" aria-hidden="true">
                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                        <div class="modal-content bg-gradient-danger">

                                            <div class="modal-header">
                                                <h6 class="modal-title" id="modal-title-hapus<?=$count?>"></h6>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">X</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="py-3 text-center">
                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                    <h4 class="heading mt-4">Konfirmasi</h4>
                                                    <b>Apakah Anda Ingin Menghapus Data
                                                        <?= $row->varietas_kedelai.' - '.$row->jenis_kedelai ?>
                                                    </b>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <a href="<?php echo base_url('admin/delete_persediaan'); ?>/<?php echo $row->id; ?>"
                                                    class="btn btn-white">Ya, Hapus</a>
                                                <button type="button" class="btn btn-link text-white ml-auto"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Hapus -->
                            <?php
                            }
                            
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Dark table -->
    <script>
    <?php
        date_default_timezone_set('Asia/Jakarta');
        ?>
    $(document).ready(function() {
        $('#kedelai').DataTable({
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
                title: 'Laporan Data Produk <?= date('d-m-y') ?>',
                className: 'btn btn-default',
            }],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
    </script>