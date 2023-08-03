<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/admin/'); ?>img/brand/favicon.png" type="image/png">

    <title>Produk Terbaru</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/store/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/store/'); ?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/store/'); ?>assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="<?= base_url('assets/store/'); ?>assets/css/owl.css">

    </script>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('customer') ?>">
                    <h2>Produk <em> Kedelai</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">

                    <ul class="navbar-nav  ml-auto  ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img class="rounded-circle" alt="Image placeholder" width="30px" height="30px"
                                            src="<?= base_url('assets/img/profile/') ?><?= $info['foto']; ?> ">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"> <?= $info['nama']; ?>
                                            <?= $this->session->flashdata('top'); ?> </span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Selamat Datang!</h6>
                                </div>
                                <a href="<?= base_url('customer/profile') ?>" class="dropdown-item">
                                    <i class="fa fa-user"></i>
                                    <span>My profile <?= $this->session->flashdata('profile'); ?> </span>
                                </a>
                                <a href="<?= base_url('customer/alamat') ?>" class="dropdown-item">
                                    <i class="fa fa-home"></i>
                                    <span> Alamat Saya <?= $this->session->flashdata('cek'); ?></span>
                                </a>
                                <a href="<?= base_url('customer/ajukan_penjual') ?>" class="dropdown-item">
                                    <i class="fa fa-dropbox"></i>
                                    <span>Ajukan Sebagai Penjual</span>
                                </a>
                                <a href="<?= base_url('customer/pesanan_saya') ?>" class="dropdown-item">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Pesanan Saya</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>