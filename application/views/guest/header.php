<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Persediaan Kedelai Jawa Timur</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/css/'); ?>favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= base_url('assets/'); ?>css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"
        integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <!-- <span class="site-heading-upper text-warning mb-3">Website Peramalan Penjualan Kedelai dengan Metode Double
                Moving Average</span> -->
            <span class="site-heading-lower">NGUDI MAKMUR II</span>
        </h1>
    </header>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-3" id="mainNav">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>"> <i
                                class="fas fa-home"></i> &nbsp; Home</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                            href="<?= base_url('Welcome/about') ?>"><i class="fas fa-bookmark"></i> &nbsp; Profil</a>
                    </li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                            href="<?= base_url('Welcome/produk'); ?>"><i class="fas fa-shopping-bag"></i> &nbsp; Belanja
                            Online</a></li>
                    <!-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="<?= base_url() ?>#budidaya"><i class="fas fa-book"></i> &nbsp; Budidaya</a></li> -->

                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                            href="<?= base_url('Welcome/varietas'); ?>"><i class="fas fa-list"></i> &nbsp; Varietas
                            kedelai</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase"
                            href="<?= base_url('Welcome/grafik'); ?>"><i class="fas fa-chart-line"></i> &nbsp; Supply
                            Kedelai</a></li>
                </ul>
                <ul class="navbar-nav mx-right">
                    <li class="nav-item px-lg-1"><a class="nav-link text-uppercase"
                            href="<?php echo base_url('index.php/auth'); ?>"><i class="fas fa-sign-in-alt"></i> &nbsp;
                            Login</a></li>
                </ul>
            </div>
        </div>
    </nav>