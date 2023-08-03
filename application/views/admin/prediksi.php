<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Prediksi Penjualan</h6>
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
                <div class="card-header">
                    <form action="" method="POST">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <div class="form-group mx-auto">
                                    <label for="exampleFormControlSelect1"> Silahkan Pilih Produk dan Bulan Di untuk di
                                        Prediksi
                                    </label>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select name="produk" class=" form-control"
                                                        id="exampleFormControlSelect1" required>
                                                        <option value="" selected disabled>Pilih Produk</option>
                                                        <?php
                                                        foreach ($produk as $pro) {
                                                            echo '<option value="'.$pro->id.'">'.$pro->varietas_kedelai.'</option>';
                                                        }
                                                        for ($i=1; $i <=12 ; $i++) { 
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select name="bln" class=" form-control"
                                                        id="exampleFormControlSelect1" required>
                                                        <option value="" selected disabled>Pilih Bulan</option>
                                                        <?php
                                                        $bln=[
                                                            1 => Januari,
                                                            2 => Februari,
                                                            3 => Maret,
                                                            4 => April,
                                                            5 => Mei,
                                                            6 => Juni,
                                                            7 => Juli,
                                                            8 => Agustus,
                                                            9 => September,
                                                            10 => Oktober,
                                                            11 => November,
                                                            12 => Desember,
                                                        ];
                                                        for ($i=1; $i <=12 ; $i++) { 
                                                            echo '<option value="'.$i.'">'.$bln[$i].'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select name="thn" class="form-control"
                                                        id="exampleFormControlSelect1" required>
                                                        <option value="" selected disabled>Pilih Tahun</option>
                                                        <?php 
                                                        $i=date('Y')-3;
                                                        $x=date('Y')+1;
                                                        for ($i=$i; $i < $x ; $i++) { 
                                                            echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-right">
                                <button type="submit" class="btn btn-sm btn-success">Proses</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-header border-0">
                    <?php
                    if($data_perhitungan){
                    ?>
                    <h3 class="mb-3">Hasil Prediksi Untuk Penjualan <?= date('F - Y',$waktu_diramal)?> </h3>
                    <div class="row">
                        <div class="col-8 col-sm-8">
                            <table>
                                <tr>
                                    <td>
                                        <b>
                                            Hasil Prediksi Penjualan &nbsp;
                                        </b>
                                    </td>
                                    <td>:&nbsp;</td>
                                    <td>
                                        <b> <?php
                                    $total =array_key_last($data_perhitungan);
                                    echo round($data_perhitungan[$total]['hasil_ramalan'],2);
                                    ?> KG
                                        </b>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>
                                            Mean Absolute Defiation &nbsp;
                                        </b>
                                    </td>
                                    <td>:&nbsp;</td>
                                    <td>
                                        <?=  round($hasil_mad,2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>
                                            Mean Square Error &nbsp;
                                        </b>
                                    </td>
                                    <td>:&nbsp;</td>
                                    <td>
                                        <?=  round($hasil_mse,2) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>
                                            Mean Absolute Percentage Error &nbsp;
                                        </b>
                                    </td>
                                    <td>:&nbsp;</td>
                                    <?php
                                if($hasil_mape <= 10){
                                    echo '<td style="color:green">';
                                }else if($hasil_mape<=20){
                                    echo '<td style="color:blue">';
                                }else if ($hasil_mape<=50){
                                    echo '<td style="color:Orange">';
                                }else if($hasil_mape>50){
                                    echo '<td style="color:red">';
                                }
                            ?>
                                    <b>
                                        <?= round($hasil_mape,2) ?>%
                                    </b>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-4 col-sm-4">
                            <table>
                                <tr>
                                    <td style="background-color:Red;"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                        &nbsp; </td>
                                    <td> &nbsp; <b>TIDAK AKURAT</b></td>
                                </tr>
                                <tr>
                                    <td style="background-color:Orange;"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                        &nbsp; </td>
                                    <td> &nbsp; <b>LAYAK ( CUKUP BAIK )</b></td>
                                </tr>
                                <tr>
                                    <td style="background-color:Blue;"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                        &nbsp; </td>
                                    <td> &nbsp; <b>BAIK</b></td>
                                </tr>
                                <tr>
                                    <td style="background-color:green;"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                                        &nbsp; </td>
                                    <td> &nbsp; <b>SANGAT AKURAT</b></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <br>
                    <a data-toggle="collapse" href="#perhitungan" data-target="#perhitungan" aria-expanded="false"
                        aria-controls="perhitungan">
                        Lihat Tabel Perhitungan >></a>
                    <div class="collapse" id="perhitungan">
                        <table class="table align-items-center table-flush table-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th>Periode</th>
                                    <th>Bulan - Tahun</th>
                                    <th>Total Penjualan</th>
                                    <th>Single Moving Average</th>
                                    <th>Double Moving Average</th>
                                    <th>At</th>
                                    <th>Bt</th>
                                    <th>Forecast</th>
                                    <!-- <th>Error</th>
                                    <th>MAD</th>
                                    <th>MSE</th>
                                    <th>MAPE</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $no = 0;
                            foreach ($data_penjualan as $row) {
                                $date=strtotime('1-'.$row->bln.'-'.$row->thn);
                            ?>
                                <tr>
                                    <td><?= $no+1 ?></td>
                                    <td><?= date('F - Y',$date) ?></td>
                                    <td><?= $row->jumlah?></td>
                                    <td>
                                        <?php
                                    if(isset($data_perhitungan[$no]['hasil_sma'])){
                                        echo $data_perhitungan[$no]['hasil_sma'];
                                    }else {
                                        echo ' -- ';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                    if(isset($data_perhitungan[$no]['hasil_dma'])){
                                        echo $data_perhitungan[$no]['hasil_dma'];
                                    }else {
                                        echo ' -- ';
                                    } 
                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                    if(isset($data_perhitungan[$no]['nilai_at'])){
                                        echo $data_perhitungan[$no]['nilai_at'];
                                    }else {
                                        echo ' -- ';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                    if(isset($data_perhitungan[$no]['nilai_bt'])){
                                        echo $data_perhitungan[$no]['nilai_bt'];
                                    }else {
                                        echo ' -- ';
                                    }
                                    ?>
                                    </td>
                                    <td>
                                        <?php
                                    if(isset($data_perhitungan[$no]['hasil_ramalan'])){
                                        echo $data_perhitungan[$no]['hasil_ramalan'];
                                    }else {
                                        echo ' -- ';
                                    }
                                    ?>
                                    </td>
                                </tr>
                                <?php
                            $no++;}?>
                            </tbody>
                        </table>

                    </div>
                    <?php 
                            }else{
                        ?>
                    <center>
                        <h3>
                            <?= $title ?>
                        </h3>
                    </center>
                    <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <?php
                    if($data_perhitungan){
                    ?>
    <div class=" row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h3 class="mb-0">Grafik Prediksi</h3>

                </div>
                <div class="card bg-default">
                    <div class="card-body">
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="peramalan-chart" style="width:100%;max-height:150%"
                                class="chart-canvas"></canvas>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- grafik-->
    <script>
    new Chart(document.getElementById("peramalan-chart"), {
        type: "line",
        data: {
            labels: [
                <?php
                foreach($data_penjualan as $row) {
                $date=strtotime('1-'.$row->bln.'-'.$row->thn);
                    echo '["'.date('F',$date) .'",'.date('Y',$date).'],';
                }
                 echo '["'.date('F',$waktu_diramal) .'",'.date('Y',$waktu_diramal).'],';?>
            ],
            datasets: [{
                    data: [
                        <?php
                            $no = 0;
                            foreach($data_penjualan as $row) {
                                echo $row->jumlah. ',';
                        } ?>
                    ],
                    label: "Pejualan",
                    borderColor: "red ",
                    fill: false
                },
                {
                    data: [
                        <?php
                            $no = 0;
                            foreach($data_penjualan as $row) {
                                if(isset($data_perhitungan[$no]['hasil_ramalan'])){
                                    echo $data_perhitungan[$no]['hasil_ramalan'].',';
                                }else {
                                    echo 0 .',';
                                }
                                $no++;
                        };
                        $total =array_key_last($data_perhitungan);
                        echo $data_perhitungan[$total]['hasil_ramalan'];
                        ?>
                    ],
                    label: "Peramalan ",
                    borderColor: "green",
                    fill: false
                }
            ]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Periode'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Penjualan'
                    }
                }
            }
        },

    });
    </script>