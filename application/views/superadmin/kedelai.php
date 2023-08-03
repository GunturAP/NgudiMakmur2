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
                    <h3 class="mb-0">Data Kedelai</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="kedelai">
                        <thead class=" thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Nama Penjual</th>
                                <th scope="col" class="sort" data-sort="budget">Jenis Kedelai</th>
                                <th scope="col" class="sort" data-sort="status">Varietas Kedelai</th>
                                <th scope="col">Grade</th>
                                <th scope="col" class="sort" data-sort="completion">Harga Per Kg</th>
                                <th scope="col" class="sort" data-sort="completion">Stok kg</th>
                                <th scope="col">Foto Produk</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                            $count = 0;
                            foreach ($data_kedelai as $row) {
                                $count = $count + 1;
                            ?>
                            <tr>
                                <td scope="row">
                                    <div class="media align-items-center">

                                        <div class="media-body">
                                            <span class="name mb-0 text-sm"> <?= $row->nama_petani ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="budget">
                                    Untuk <?= $row->jenis_kedelai ?>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-success"></i>
                                        <span class="status"> <?= $row->varietas_kedelai ?></span>
                                    </span>
                                </td>
                                <td>
                                    <?= $row->grade ?>
                                </td>
                                <td>
                                    Rp. <?= $row->harga ?>
                                </td>
                                <td>
                                    <?= $row->stok ?>
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