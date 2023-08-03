<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h4>Penawaran Terbaik</h4>
                <h2>Kualitas Tinggi</h2>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h4>Flash Deals</h4>
                <h2>Cari Produk Terbaik Anda</h2>
            </div>
        </div>
    </div>
</div>
<!-- Banner Ends Here -->

<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-heading">
                    <h2>Produk Terbaru</h2>

                </div>

            </div>

            <div class="col-md-4">
                <form action="<?= base_url('customer/cari') ?>" method="post">
                    <div class="section-heading">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Cari Produk  ....." name="cari"
                                autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i> &nbsp; Cari</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            if (!$kedelai) {
                echo '<center> <h3> Tidak Ada Produk </h3></center>';
            }
            $count = 0;
            foreach ($kedelai as $row) {
                $count = $count + 1;

            ?>

            <div class="col-md-4">
                <div class="product-item">
                    <a href="<?= base_url('customer/detailproduk'); ?>/<?php echo $row->id ?>">
                        <?php
                            $ft = unserialize($row->foto_kedelai);
                            ?>


                        <img width="240px" height="240px" src="<?= base_url('assets/img/produk/'); ?><?= $ft['0']; ?>"
                            alt=" <?= $ft['0'] ?>">

                        <div class="down-content">
                            <a href="#">
                                <h4><?= $row->varietas_kedelai ?></h4>
                            </a>
                            <h6>Rp. <?php echo number_format("$row->harga", 0, ",", "."); ?></h6>
                            <p><?= $row->info_lain ?></p>
                            <?php
                                $dt = $this->db->get_where('feedback', ['id_produk' => $row->id])->result();
                                
                                if ($dt) {
                                    $jml = 0;
                                    $totalstar = 0;
                                    $ratestar = 0;
                                    echo ' <ul class="stars">';
                                    foreach ($dt as $star) {
                                        $jml = $jml + 1;
                                        $totalstar = $totalstar + $star->star;
                                    }
                                    $ratestar = round($totalstar / $jml, 0);
                                    for ($x = 1; $x <= $ratestar; $x++) {
                                        echo '<li><i class="fa fa-star"></i></li>';
                                    }
                                    for ($x = 5 - $ratestar; $x >= 1; $x--) {
                                        echo '<li><i class="fa fa-star-o"></i></li>';
                                    }

                                    echo '</ul>';
                                } else {
                                ?>
                            <ul class="stars">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <?php
                                }
                                ?>

                            <a href="<?= base_url('customer/detailproduk'); ?>/<?php echo $row->id ?>#ulasan">


                                <span>Ulasan (<?php
                                                    if ($dt) {
                                                        echo $jml;
                                                    } else {
                                                        echo 0;
                                                    } ?>)</span>
                            </a>
                        </div>
                </div>
            </div>
            <?php
            }

            ?>
        </div>
    </div>
</div>