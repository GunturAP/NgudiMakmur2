 <div class="container-fluid mt--66">
     <div class="row">
         <div class="col-xl-8 order-xl-1">
             <div class="card">
                 <div class="card-header">
                     <div class="row align-items-center">
                         <div class="col-8">
                             <h3 class="mb-0"> Edit Persediaan Kedelai </h3>
                         </div>

                     </div>
                 </div>
                 <div class="card-body">
                     <?php echo form_open_multipart('Admin/edit_persediaan_post'); ?>
                     <h6 class=" heading-small text-muted mb-4">Informasi Kedelai</h6>
                     <div class="pl-lg-4">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username">Jenis Kedelai </label>



                                     <Select id="jenis_kedelai" name="jenis_kedelai" class="form-control" placeholder="Pilih ">

                                         <option value="Konsumsi"> Untuk Konsumsi</option>
                                         <option value="Bibit"> Untuk Bibit</option>
                                     </Select>
                                 </div>
                             </div>
                             <input type="text" hidden name="id" class="form-control" value="<?= $kedelai['id'] ?>">
                             <input type="text" hidden name="nama" class="form-control" value="<?= $kedelai['nama_petani'] ?>">
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username">Varietas Kedelai <?= form_error('varietas_kedelai', '<i class="fa fa-exclamation-circle text-red" aria-hidden="true"><small> <span class="text-danger font-weight-700">', '</span></small></i>'); ?></label>

                                     <input type="text" id="varietas_kedelai" name="varietas_kedelai" class="form-control" placeholder="Kedelai Putih" value="<?= $kedelai['varietas_kedelai'] ?>">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-email">Grade<?= form_error('grade', '<i class="fa fa-exclamation-circle text-red" aria-hidden="true"><small> <span class="text-danger font-weight-700">', '</span></small></i>'); ?></label>
                                     <input type="text" id="grade" name="grade" class="form-control" placeholder="A-C" value="<?= $kedelai['grade'] ?>">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-first-name">Harga per kg <?= form_error('harga', '<i class="fa fa-exclamation-circle text-red" aria-hidden="true"><small> <span class="text-danger font-weight-700">', '</span></small></i>'); ?></label>
                                     <input type="number" id="harga" name="harga" class="form-control" placeholder="15000" value="<?= $kedelai['harga'] ?>">
                                 </div>
                             </div>
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-last-name">Total Persediaan (Kg) <?= form_error('total_persediaan', '<i class="fa fa-exclamation-circle text-red" aria-hidden="true"><small> <span class="text-danger font-weight-700">', '</span></small></i>'); ?></label>
                                     <input type="number" id="total_persediaan" name="total_persediaan" class="form-control" placeholder="150" value="<?= $kedelai['stok'] ?>">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <hr class="my-4" />
                     <!-- Address -->
                     <h6 class="heading-small text-muted mb-4">Informasi Lain</h6>
                     <div class="pl-lg-4">
                         <div class="row">
                             <div class="col-md-12">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-address">Foto Kedelai
                                     </label>
                                     <input name="foto_lama" hidden value="<?= $kedelai['foto_kedelai'] ?>">
                                     <input type="file" multiple id="gallery-photo-add" name="foto[]" class="form-control" placeholder="Foto" accept="image/png, image/jpeg, image/jpg">
                                     <br>
                                     <div class="row">
                                         <div class="gallery" id="tes"></div>
                                     </div>
                                     <script>
                                         $(function() {
                                             // Multiple images preview in browser
                                             var imagesPreview = function(input, placeToInsertImagePreview) {

                                                 if (input.files) {
                                                     var filesAmount = input.files.length;

                                                     for (i = 0; i < filesAmount; i++) {
                                                         var reader = new FileReader();

                                                         reader.onload = function(event) {
                                                             $($.parseHTML('<img  class="col-lg-6">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                                         }

                                                         reader.readAsDataURL(input.files[i]);
                                                     }
                                                 }
                                                 document.getElementById('tes').innerHTML = ''

                                             };

                                             $('#gallery-photo-add').on('change', function() {
                                                 imagesPreview(this, 'div.gallery');
                                             });
                                         });
                                     </script>
                                 </div>
                             </div>

                         </div>
                     </div>
                     <div class="pl-lg-4">
                         <div class="form-group">
                             <label class="form-control-label">Informasi tentang kedelai anda </label>
                             <textarea rows="4" class="form-control" name="info_lain" placeholder="A few words about you ..."><?= $kedelai['info_lain'] ?></textarea>
                         </div>


                     </div>
                     <hr class="my-4" />
                     <div class="col- text-right">
                         <button type="submit" class="btn btn-success mt-4">Simpan Data</button>
                     </div>
                     <?php form_close(); ?>
                 </div>
             </div>
         </div>
     </div>
 </div>