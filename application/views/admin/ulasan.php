<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Ulasan Pelanggan</h6>
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
                if ($ulasan) {
                ?>
                <div class="card-header border-0">
                    <h3 class="mb-0">Ulasan Pelanggan</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="ulasan">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Id Pesanan</th>
                                <th scope="col" class="sort" data-sort="name">Email pembeli</th>
                                <th scope="col" class="sort" data-sort="budget">Foto Produk</th>
                                <th scope="col" class="sort" data-sort="budget">bintang</th>
                                <th scope="col" class="sort" data-sort="status">Komentar</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                                $count = 0;
                                foreach ($ulasan as $row) {
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
                                <td>
                                    <?= $row->email_pembeli ?>
                                </td>
                                <td>
                                    <?php
                                            $ft = $this->db->get_where('kedelai', ['id' => $row->id_produk])->row_array();

                                            ?>
                                    <a data-toggle="collapse" href="#ft<?php echo $count ?>"
                                        data-target="#ft<?php echo $count ?>" aria-expanded="false"
                                        aria-controls="ft<?php echo $count ?>">
                                        Lihat Foto</a>
                                    <div class="collapse" id="ft<?php echo $count ?>">

                                        <img class="rounded-image"
                                            src="<?php echo base_url('assets/img/produk/'); ?><?= $ft['foto_kedelai']; ?>"
                                            width="90px" height="120px" overflow="hidden" border-radius="50%">
                                </td>
                                <td class="budget">
                                    <?php
                                            echo ' <ul class="list-group list-group-horizontal">';

                                            for ($x = 1; $x <= $row->star; $x++) {

                                                echo '<dt><i class="fa fa-star text-yellow"></i></dt>';
                                            }
                                            for ($x = 5 -  $row->star; $x >= 1; $x--) {
                                                echo '<dt><i class="fa fa-star"></i></dt>';
                                            }

                                            echo '</ul>';

                                            ?>

                                </td>

                                <td>
                                    <?= $row->komentar ?>

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
                    <h3 class="mb-0">Tidak Ada Ulasan Pesanan</h3>

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
        $('#ulasan').DataTable({

            columnDefs: [{
                targets: -1,
                className: 'dt-center'
            }],

            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
    </script>