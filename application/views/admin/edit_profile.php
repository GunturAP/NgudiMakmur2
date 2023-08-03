 <div class="container-fluid mt--66">
     <div class="row">
         <div class="col-xl-8 order-xl-1">
             <div class="card">
                 <div class="card-header">
                     <div class="row align-items-center">
                         <div class="col-8">
                             <h3 class="mb-0"> Edit Data Profil </h3>
                         </div>

                     </div>
                 </div>

                 <div class="card-body">
                     <?php echo form_open_multipart('Admin/edit_profile_post'); ?>
                     <div class="pl-lg-4">
                         <h4 class=" heading-small text-muted mb-4">Data Diri</h4>

                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username"> Email </label>
                                     <input type="text" name="email" class="form-control"
                                         value="<?= $penjual['email'] ?>" hidden>
                                     <input type="text" class="form-control" value="<?= $penjual['email'] ?>" disabled>
                                 </div>
                             </div>
                             <input type="text" hidden name="id" class="form-control" value="<?= $penjual['id'] ?>">
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username">Nama Lengkap </label>

                                     <input type="text" id="varietas_kedelai" name="nama" class="form-control"
                                         placeholder="Nama Anda" value="<?= $penjual['nama'] ?>">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username">Kelompok Tani </label>

                                     <input type="text" id="varietas_kedelai" name="kelompok_tani" class="form-control"
                                         placeholder="Nama Anda" value="<?= $alamat['kelompok_tani'] ?>">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-2">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-city">No </label>
                                     <input type="text" class="form-control" disabled value="+62">
                                 </div>
                             </div>
                             <div class="col-lg-4">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-country"> Whatsapp</label>
                                     <input type="text" name="no_telepon" class="form-control"
                                         placeholder="823781791881" value="<?= $penjual['no_telephone'] ?>">

                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-address">Foto Diri
                                     </label>
                                     <input name="foto_lama" hidden value="<?= $penjual['foto'] ?>">
                                     <input id="foto" name="foto" class="form-control" placeholder="Foto" type="file"
                                         accept="image/png, image/jpeg, image/jpg">
                                 </div>
                             </div>
                         </div>
                         <?php

                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=11",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "GET",
                                CURLOPT_HTTPHEADER => array(
                                    "key: bbca5a0beaded406986eaf74784ffae5"
                                ),
                            ));

                            $response = curl_exec($curl);
                            $err = curl_error($curl);

                            curl_close($curl);

                            if ($err) {
                                echo "cURL Error #:" . $err;
                            } else {
                                $kota = json_decode($response, true);
                            }
                            ?>

                         <hr class="my-4" />
                         <!-- Address -->
                         <h6 class="heading-small text-muted mb-4">Data Alamat</h6>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username">Kota / Kabupaten </label>
                                     <select id="id_kota" name="id_kota" class="form-control">
                                         <option value="<?= $alamat['id_kota'] ?>"><?= $alamat['kota_kab'] ?></option>
                                         <?php
                                            if ($kota['rajaongkir']['status']['code'] == '200') {
                                                foreach ($kota['rajaongkir']['results'] as $kt) {
                                                    echo "<option id='id_kt_$kt[city_id]' value='$kt[city_id]'> $kt[type] $kt[city_name] </option>";
                                                }
                                            }
                                            ?>
                                     </select>
                                     <input name="kota" type="text" class="form-control" id="kota"
                                         placeholder="Nama Kota" value="<?= $alamat['kota_kab'] ?>" hidden>
                                 </div>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username"> Kecamatan </label>

                                     <input type="text" id="varietas_kedelai" name="kecamatan" class="form-control"
                                         placeholder="Nama Anda" value="<?= $alamat['kecamatan'] ?>">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username"> Detail Lainnya </label>

                                     <textarea rows="4" class="form-control" name="detail_lainnya"
                                         placeholder="A few words about you ..."><?= $alamat['detail_lainnya'] ?></textarea>
                                 </div>
                             </div>
                         </div>

                         <hr class="my-4" />
                         <!-- Address -->
                         <h6 class="heading-small text-muted mb-4">Data Rekening Bank</h6>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username">Nama Bank</label>
                                     <select id="nama_bank" name="nama_bank" class="form-control" required>
                                         <option value="<?= $bank['nama_bank'] ?>"><?= $bank['nama_bank'] ?></option>
                                         <option value="BNI">BNI</option>
                                         <option value="BCA">BCA</option>
                                         <option value="BTN">BTN</option>
                                         <option value="MANDIRI">MANDIRI</option>
                                         <option value="BRI">BRI</option>
                                         <option value="BANK JATIM">BANK JATIM</option>
                                     </select>

                                 </div>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username"> Nama di Buku Rekening
                                     </label>

                                     <input type="text" id="varietas_kedelai" name="nama_rekening" class="form-control"
                                         placeholder="Nama Anda" value="<?= $bank['nama_rekening'] ?>">
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="form-group">
                                     <label class="form-control-label" for="input-username"> Nomor Rekening </label>
                                     <input type="text" id="varietas_kedelai" name="no_rekening" class="form-control"
                                         placeholder="Nama Anda" value="<?= $bank['no_rekening'] ?>">

                                 </div>
                             </div>
                         </div>
                     </div>
                     <hr class="my-4" />
                     <!-- Address -->

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
 <script>
document.getElementById('id_kota').addEventListener('change', function() {
    console.log()
    $w = 'id_kt_' + this.value
    $a = document.getElementById($w).innerHTML
    document.getElementById('kota').value = $a
})
 </script>