<!-- Page Content -->
<div class="banner header-text">
    <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
            <div class="text-content">
                <h2 style="color: crimson;">Kualitas Tinggi</h2>
            </div>
        </div>
        <div class="banner-item-02">
            <div class="text-content">
                <h2 style="color: red;">Cari Produk Terbaik Anda</h2>
            </div>
        </div>
    </div>
</div>

<div class="best-features about-features">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">

                    <h2><?= $detail_produk->varietas_kedelai ?> Untuk <?= $detail_produk->jenis_kedelai ?></h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-image">
                    <?php
                    $ft = unserialize($detail_produk->foto_kedelai);

                    ?>

                    <div id="produk<?php echo $detail_produk->id ?>" class="carousel slide">
                        <div class="carousel-inner">
                            <?php
                            $count = 0;
                            foreach ($ft as $row) {

                                if ($count == 0) {
                                    echo '<div class="carousel-item active">';
                                } else {
                                    echo '<div class="carousel-item">';
                                }
                                echo '<img class="d-block w-100" src="' . base_url('assets/img/produk/') . $row . '" alt="' . $row . '">';
                                echo '</div>';

                                $count = $count + 1;
                            }
                            ?>

                        </div>
                        <a class="carousel-control-prev" href="#produk<?php echo $detail_produk->id  ?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#produk<?php echo $detail_produk->id  ?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="left-content">
                    <h3>Rp. <?php echo number_format("$detail_produk->harga", 0, ",", "."); ?> <small> / Kg</small> </h3>

                    <p>
                    <table>
                        <tr>
                            <td width="150px"> Nama Petani </td>
                            <td width="20px"> : </td>
                            <td><?= $detail_produk->nama_petani ?></td>
                        </tr>
                        <tr>
                            <td> Jenis Kedelai </td>
                            <td> : </td>
                            <td> Untuk <?= $detail_produk->jenis_kedelai ?></td>
                        </tr>
                        <tr>
                            <td> Varietas Kedelai </td>
                            <td> : </td>
                            <td> <?= $detail_produk->varietas_kedelai ?></td>
                        </tr>
                        <tr>
                            <td> Grade </td>
                            <td> : </td>
                            <td> <?= $detail_produk->grade ?></td>
                        </tr>
                        <tr>
                            <td> Stok Kedelai </td>
                            <td> : </td>
                            <td> <?= $detail_produk->stok ?> (Kg)</td>
                        </tr>
                        <tr>
                            <td valign="top"> Deskripsi </td>
                            <td valign="top"> : </td>
                            <td> <?= $detail_produk->info_lain ?></td>
                        </tr>

                    </table>

                    </p>

                    <ul>
                        <li><span style="font-size: 12px; color: Dodgerblue;">
                                <a href="" data-toggle="modal" data-target="#loginModal" class="filled-button"><i class="fa fa-cart-arrow-down   "> </i> Beli Sekarang</a>
                            </span>
                        </li>
                    </ul>



                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<?php
if ($ulasan) {

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading" id="ulasan">
                    <h2>Ulasan Produk</h2>
                </div>
            </div>
        </div>
        <?php
        foreach ($ulasan as $row) {
            $count = $count + 1;
            $user = $this->db->get_where('user', ['email' => $row->email_pembeli])->row_array();
        ?>
            <div class=" row">
                <div class="col-md-1">
                    <br>
                    <img class="rounded-circle " width="50px" alt="Image placeholder" src="<?= base_url('assets/img/profile/') ?><?= $user['foto']; ?> ">
                </div>
                <div class="col-md-8">
                    <div class="product-item mb-0">
                        <div class=" down-content mb-0">
                            <h4 class="mb-0">
                                <?= $user['nama']; ?>
                            </h4>
                            <?php
                            echo ' <ul class="stars">';
                            for ($x = 1; $x <= $row->star; $x++) {
                                echo '<li><i class="fa fa-star"></i></li>';
                            }
                            for ($x = 5 - $row->star; $x >= 1; $x--) {
                                echo '<li><i class="fa fa-star-o"></i></li>';
                            }

                            echo '</ul>';
                            ?>
                            <hr>


                            <?= $row->komentar ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <?php
        }
        ?>
    </div>
<?php
} else {
?>
    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Ulasan Produk</h2>
                    </div>
                </div>

                <div class="col-md-12">
                    <p> ------------------------------------------------------------------------------- </p>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>