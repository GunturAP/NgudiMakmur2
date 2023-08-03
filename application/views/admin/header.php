<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>
        <?php echo $info['nama']; ?>

    </title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/admin/'); ?>img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>vendor/fontawesome5/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/'); ?>css/argon.css?v=1.2.0" type="text/css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Datatables -->
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets') ?>/DataTables/DataTables-1.12.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets') ?>/DataTables/Buttons-2.2.3/css/buttons.dataTables.min.css" />
    <script src="<?= base_url('assets') ?>/DataTables/jQuery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets') ?>/DataTables/DateTime-1.1.2/css/dataTables.dateTime.css" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets') ?>/DataTables/FixedColumns-4.1.0/css/fixedColumns.dataTables.css" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets') ?>/DataTables/Responsive-2.3.0/css/responsive.dataTables.css" />
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets') ?>/DataTables/Scroller-2.0.6/css/scroller.dataTables.css" />

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    bootstrap -->
    <!-- // Chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="<?= base_url('assets/admin/'); ?>img/brand/icon.ico" class="navbar-brand-img" alt="...">

                    <h2> Ngudi Makmur II </h2>
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->uri_string() == 'Admin') { echo 'active'; } ?>"
                                href="<?php echo base_url('Admin'); ?>">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">

                            <a class="nav-link <?php if($this->uri->uri_string() == 'Admin/persediaan') { echo 'active'; } ?>"
                                href="<?php echo base_url('Admin/persediaan'); ?>">
                                <i class="fas fa-store-alt text-primary "></i>
                                <span class="nav-link-text">Persediaan Kedelai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->uri_string() == 'Admin/pesanan') { echo 'active'; } ?>"
                                href="<?php echo base_url('Admin/pesanan'); ?>">
                                <i class="ni ni-cart text-primary"></i>
                                <span class="nav-link-text">Pesanan Baru</span>
                                <?= $this->session->flashdata('baru'); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->uri_string() == 'Admin/pesanan_di_proses') { echo 'active'; } ?>"
                                href="<?php echo base_url('Admin/pesanan_di_proses'); ?>">
                                <i class="ni ni-delivery-fast text-primary"></i>
                                <span class="nav-link-text">Pesanan dalam Proses</span>
                                <?= $this->session->flashdata('proses'); ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->uri_string() == 'Admin/pesanan_selesai') { echo 'active'; } ?>"
                                href="<?php echo base_url('Admin/pesanan_selesai'); ?>">
                                <i class="ni ni-bag-17 text-primary"></i>
                                <span class="nav-link-text">Riwayat Pesanan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($this->uri->uri_string() == 'Admin/ulasan') { echo 'active'; } ?>"
                                href="<?php echo base_url('Admin/ulasan'); ?>">
                                <i class="fas fa-comments text-primary"></i>
                                <span class="nav-link-text">Ulasan Pelangggan</span>
                            </a>
                        </li>



                    </ul>
                    <hr class="my-2">
                    <ul class="navbar-nav">
                        <li class=" nav-item">
                            <a class="nav-link <?php if($this->uri->uri_string() == 'Admin/prediksi') { echo 'active'; } ?>"
                                href="<?php echo base_url('Admin/prediksi'); ?>">
                                <i class="fas fa-chart-line text-primary"></i>
                                <span class="nav-link-text">Prediksi Penjualan</span>
                            </a>
                        </li>
                    </ul>
                    <!-- 
                    <hr class="my-3">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Admin/download_manual_book'); ?>">
                                <i class="ni  ni-collection text-primary"> </i>
                                <span class="nav-link-text">Download Buku Panduan </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com/channel/UC8xE7idIQsPAwC8TwyQ_xWw/videos">
                                <i class="ni  ni-laptop text-primary"> </i>
                                <span class="nav-link-text">Video Panduan </span>
                            </a>
                        </li>

                    </ul> -->
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="ni ni-user-run text-red"></i>
                                <span class="nav-link-text">
                                    <font color="red"> <b>Log Out</b> </font>
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Notif end -->
    <!-- Main content -->