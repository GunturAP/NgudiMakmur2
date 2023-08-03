 <div class="main-content" id="panel">

     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
         <div class="container-fluid">
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <?= $this->session->flashdata('top'); ?>

                 <ul class="navbar-nav align-items-center  ml-md-auto ">
                     <li class="nav-item d-xl-none">
                         <!-- Sidenav toggler -->
                         <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                             data-target="#sidenav-main">
                             <div class="sidenav-toggler-inner">
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                             </div>
                         </div>
                     </li>
                     <?php
                    date_default_timezone_set('Asia/Jakarta');

                     if($notif){
                        ?>
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">
                             <i class="fas fa-bell fa-spin" style="color:orange"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                             <!-- Dropdown header -->
                             <div class="px-3 py-3">
                                 <h6 class="text-sm text-muted m-0">Anda Memiliki Pemberitahuan Terbaru</h6>
                             </div>
                             <div class="list-group list-group-flush">
                                 <?php
                                 $no=1;
                                   foreach ($notif as $ntf) {
                                    if($no==6){
                                        break;
                                    }
                                    ?>
                                 <!-- List group -->
                                 <a href="<?= $ntf->link?>" class="list-group-item list-group-item-action">
                                     <div class="row align-items-center">
                                         <div class="col-auto">
                                             <!-- Avatar -->
                                             <!-- <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg"
                                                 class="avatar rounded-circle"> -->
                                         </div>
                                         <div class="col ml--2">
                                             <div class="d-flex justify-content-between align-items-center">
                                                 <div>
                                                     <h4 class="mb-0 text-sm"><?= $ntf->title ?></h4>
                                                 </div>
                                                 <div class=" text-right text-muted">
                                                     <small>
                                                         <?php
                                                            $a = date_create(date('y-m-d H:i', $ntf->time));
                                                            $b = date_create(date('y-m-d H:i', time()));
                                                            $diff = date_diff($a, $b);
                                                            
                                                            if($diff->h==0){
                                                                echo $diff->i.' Menit Yang Lalu';
                                                            }else if( $diff->d ==0){
                                                                echo $diff->h.' Jam Yang Lalu';

                                                            }else if( $diff->m ==0){
                                                                if($diff->d >7){
                                                                    echo 'Minggu Lalu';
                                                                }else{
                                                                    echo $diff->d.' hari Lalu';
                                                                }

                                                            }else if ( $diff->m >0) {
                                                                echo $diff->m.' Bulan Yang Lalu';
                                                            }
                                                        ?>
                                                     </small>
                                                 </div>
                                             </div>
                                             <p class="text-sm mb-0"><?= $ntf->from_email ?></p>
                                         </div>
                                     </div>
                                 </a>
                                 <?php $no++; } ?>
                             </div>
                             <!-- View all -->
                             <a href="<?= base_url('admin/hapus_notif/')?>"
                                 class="dropdown-item text-center text-primary font-weight-bold py-3">Hapus
                                 Semua</a>
                         </div>
                     </li>
                     <?php }else{
                         ?>
                     <li class=" nav-item dropdown">
                         <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">
                             <i class="fas fa-bell"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                             <!-- Dropdown header -->
                             <div class="px-3 py-3">
                                 <h6 class="text-sm text-muted m-0">Tidak Ada Pemberitahuan</h6>
                             </div>
                         </div>
                     </li>
                     <?php } ?>

                 </ul>
                 <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                     <li class="nav-item dropdown">
                         <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">
                             <div class="media align-items-center">
                                 <span class="avatar avatar-sm rounded-circle">
                                     <img alt="Image placeholder"
                                         src="<?= base_url('assets/img/profile/') . $info['foto']; ?>">
                                 </span>
                                 <div class="media-body  ml-2  d-none d-lg-block">
                                     <span class="mb-0 text-sm  font-weight-bold"><?php echo $info['nama'] ?></span>
                                 </div>
                             </div>
                         </a>
                         <div class="dropdown-menu  dropdown-menu-right ">
                             <div class="dropdown-header noti-title">
                                 <h6 class="text-overflow m-0">Selamat Datang</h6>
                             </div>
                             <a href="<?= base_url('admin/edit_profile') ?>/<?php echo $info['id'] ?>"
                                 class="dropdown-item badge-notif">
                                 <i class="ni ni-single-02"></i>
                                 <span>Edit Profil
                                 </span>
                             </a>
                             <div class="dropdown-divider"></div>
                             <a href="#" data-toggle="modal" data-target="#logoutModal" class="dropdown-item">
                                 <i class="ni ni-user-run"></i>
                                 <span>Logout</span>
                             </a>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <!-- Notif Start -->
     <div class="er-data" data-erdata="<?php echo $this->session->flashdata('msgeror'); ?>"></div>
     <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('msg'); ?>"></div>
     <div class="nt-data" data-ntdata="<?php echo $this->session->flashdata('notif'); ?>"
         data-txtdata="<?php echo $this->session->flashdata('text'); ?>"></div>