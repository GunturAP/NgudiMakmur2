   <footer class="footer pt-0">
       <div class="row align-items-center justify-content-lg-between">
           <div class="col-lg-12">
               <div class="copyright text-center  text-lg-center  text-muted">
                   Copyright &copy; <?= date('Y') ?> 1918069 - Guntur AP
               </div>
           </div>

       </div>
   </footer>
   </div>
   </div>

   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Ingin Keluar ?</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   Silahkan Pilih Log Out untuk Mengakhiri Sesi Akun Anda
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   <a class="btn btn-danger"
                       href="<?php echo base_url('auth/logout'); ?>//<?php echo 'email2' ?>">Logout</a>
               </div>
           </div>
       </div>
   </div>


   <!-- Sweet Alert -->
   <script src="<?= base_url('assets/js/') ?>sweet.js"></script>
   <!-- Core -->
   <script src="<?= base_url('assets/admin/'); ?>vendor/jquery/dist/jquery.min.js"></script>
   <script src="<?= base_url('assets/admin/'); ?>vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url('assets/admin/'); ?>vendor/js-cookie/js.cookie.js"></script>
   <script src="<?= base_url('assets/admin/'); ?>vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
   <script src="<?= base_url('assets/admin/'); ?>vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
   <!-- Optional JS -->
   <script src="<?= base_url('assets/admin/'); ?>vendor/chart.js/dist/Chart.min.js"></script>
   <script src="<?= base_url('assets/admin/'); ?>vendor/chart.js/dist/Chart.extension.js"></script>
   <!-- Argon JS -->
   <script src="<?= base_url('assets/admin/'); ?>js/argon.js?v=1.2.0"></script>
   <!-- Datatables -->
   <!-- Page level plugins -->
   <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <!-- Datatables -->
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/DateTime-1.1.2/js/dataTables.dateTime.js">
   </script>
   <script type="text/javascript"
       src="<?= base_url('assets') ?>/DataTables/FixedColumns-4.1.0/js/dataTables.fixedColumns.js"></script>
   <script type="text/javascript"
       src="<?= base_url('assets') ?>/DataTables/Responsive-2.3.0/js/dataTables.responsive.js"></script>
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/Scroller-2.0.6/js/dataTables.scroller.js">
   </script>
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/JSZip-2.5.0/jszip.min.js"></script>
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
   <script type="text/javascript"
       src="<?= base_url('assets') ?>/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js">
   </script>
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/Buttons-2.2.3/js/buttons.html5.min.js">
   </script>
   <script type="text/javascript" src="<?= base_url('assets') ?>/DataTables/Buttons-2.2.3/js/buttons.print.min.js">
   </script>


   </body>

   </html>