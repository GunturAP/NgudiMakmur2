<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Pesanan Dalam Proses</h6>
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
                    <h3 class="mb-0">Pesanan di Proses</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Id Pesanan</th>
                                <th scope="col" class="sort" data-sort="name">Nama Pemesan</th>
                                <th scope="col" class="sort" data-sort="budget">Jenis Kedelai</th>
                                <th scope="col" class="sort" data-sort="budget">Jumlah Pesanan</th>
                                <th scope="col" class="sort" data-sort="status">Alamat Pengiriman</th>
                                <th scope="col" class="sort" data-sort="status">Status Pesanan</th>
                                <th scope="col" class="sort" data-sort="status">Aksi</th>
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



                                <?php
                                        if ($row->status == '3') {
                                        ?>
                                <td class="budget">
                                    Sedang Di Proses

                                </td>
                                <td>
                                    <button class="btn  btn-success" type="button" data-toggle="modal"
                                        data-target="#prosesModal<?= $row->id_pesanan ?>">Pesanan Dikirim</button>
                                    <!-- prosess Modal-->
                                    <div class="modal fade" id="prosesModal<?= $row->id_pesanan ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> Apakah Pesanan
                                                        <?= $row->id_pesanan ?> Sudah Dikirim ke Jasa Pengiriman ? </h5>
                                                    <button class="close" type="button" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="<?= base_url('admin/pesanan_dikirim') ?>">
                                                        <label class="form-control-label" for="input-email">Nomor Resi
                                                            Untuk Pesanan <?= $row->id_pesanan ?> </label>
                                                        <input type="text" name="no_resi" class="form-control"
                                                            placeholder="Nomor Resi Pesanan">
                                                        <input type="text" name="id_pesanan" class="form-control"
                                                            placeholder="Nomor Resi Pesanan"
                                                            value="<?= $row->id_pesanan ?>" hidden>

                                                </div>

                                                <div class=" modal-footer">
                                                    <button class="btn  btn-secondary" type="button"
                                                        data-dismiss="modal">Belum</button>
                                                    <button class="btn btn-success" type="submit">Pesanan Sudah
                                                        Dikirim</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <?php
                                        } elseif ($row->status == '4') {
                                        ?>
                                <td class="budget">
                                    Dalam Pengiriman
                                </td>
                                <td>
                                    <button disabled class="btn  btn-secondary" type="button">Pesanan Telah
                                        Dikirim</button>
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
                    <h3 class="mb-0">Tidak Ada Pesanan Yang Sedang Di Proses</h3>

                </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>