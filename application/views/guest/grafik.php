<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<section class="page-section cta" style="background:linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.65)), url(<?= base_url('/assets/img/bggrafik.jpeg') ?>); filter: brightness(100%)">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <center>

                    <h2 class="section-heading mb-0">
                        <span class="section-heading-upper" style="font-size: 24px; color:aliceblue">persediaan Kedelai Bulan Ini</span>
                        <span class="section-heading-lower" style="font-size: 34px; color:aliceblue">Kelompok Tani Ngudi Makmur II</span>
                    </h2>
                </center>
                <div class="cta-inner bg-faded text-center rounded " style=" opacity: 0.85;
    filter: alpha(opacity=60); ">
                    <canvas id="line-chart" width="800" height="450" "></canvas>


                </div>
            </div>
        </div>
    </div>
</section>
<section class=" page-section cta" style="background:linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.65)), url(<?= base_url('/assets/img/grafik2.jpeg') ?>); filter: brightness(100%)">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-9 mx-auto">
                                    <center>

                                        <h2 class="section-heading mb-0">
                                            <span class="section-heading-upper" style="font-size: 24px; color:aliceblue">permintaan Kedelai Bulan Ini</span>
                                            <span class="section-heading-lower" style="font-size: 34px;color:aliceblue">Kelompok Tani Ngudi Makmur II</span>
                                        </h2>
                                    </center>

                                    <div class="cta-inner bg-faded text-center rounded " style=" opacity: 0.85;
    filter: alpha(opacity=60); ">
                                        <canvas id="line-demand" width="800" height="450"></canvas>


                                    </div>
                                </div>
                            </div>
                        </div>
</section>
<section class="page-section cta" style="background:linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.65)), url(<?= base_url('/assets/img/grafik3.jpeg') ?>); filter: brightness(100%)">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <center>

                    <h2 class="section-heading mb-0">
                        <span class="section-heading-upper" style="font-size: 24px; color:aliceblue">Selisih Persediaan dan Permintaan Kedelai Bulan Ini</span>
                        <span class="section-heading-lower" style="font-size: 34px; color:aliceblue">Kelompok Tani Ngudi Makmur II</span>
                    </h2>
                </center>
                <div class="text-right">

                    <a class="btn btn-secondary" href="<?= base_url('Welcome/grafik_selisih') ?>">Refresh Data</a>
                </div>

                <div class="cta-inner bg-faded text-center rounded " style=" opacity: 0.85;
    filter: alpha(opacity=60); ">


                    <canvas id="line-selisih" width="800" height="450"></canvas>


                </div>
            </div>
        </div>
    </div>
</section>
<script>
    <?php
    $hari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    $this->db->where('bln', date('n'));
    $this->db->where('tipe', 'supply');
    $this->db->order_by('tgl', 'ASC');
    $this->db->from('grafik');
    $query = $this->db->get()->row_array();

    ?>
    Bulan = new Date().getMonth();
    new Chart(document.getElementById("line-chart"), {
        type: 'line',
        data: {

            labels: [
                <?php
                for ($i = $query['tgl']; $i <= $hari; $i++) {
                    echo $i . ',';
                }
                ?>
            ],
            datasets: [
                <?php

                $count = 0;
                foreach ($grafik as $row) {
                    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                    $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];
                    $count = $count + 1;
                    $where = array(
                        'varietas_kedelai' => $row->varietas_kedelai,
                        'bln' => date('n'),
                        'tahun' => date('Y'),
                        'tipe' => 'supply'
                    );
                    $show = $this->Mod_auth->wheregrafik($where);
                ?> {
                        data: [<?php
                                $cnt = 0;
                                foreach ($show as $dt) {
                                    echo $dt->stok . ',';
                                } ?>],
                        label: "<?= $row->varietas_kedelai ?>",
                        borderColor: "<?= $color ?>",
                        fill: true
                    },
                <?php

                }
                ?>

            ]
        },
        options: {
            title: {
                display: true,
                text: 'Persediaan Kedelai Bulan ini'
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Kilogram'
                    }
                }
            }
        }
    });
</script>
<script>
    <?php
    $hari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    $this->db->where('bln', date('n'));
    $this->db->where('tipe', 'demand');
    $this->db->order_by('tgl', 'ASC');
    $this->db->from('grafik');
    $query = $this->db->get()->row_array();

    ?>
    new Chart(document.getElementById("line-demand"), {
        type: 'line',
        data: {

            labels: [
                <?php
                for ($i = $query['tgl']; $i <= $hari; $i++) {
                    echo $i . ',';
                }
                ?>
            ],
            datasets: [
                <?php

                $count = 0;
                foreach ($grafikdmnd as $row) {
                    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                    $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];
                    $count = $count + 1;
                    $where = array(
                        'varietas_kedelai' => $row->varietas_kedelai,
                        'bln' => date('n'),
                        'tahun' => date('Y'),
                        'tipe' => 'demand'
                    );
                    $show = $this->Mod_auth->wheregrafik($where);
                ?> {
                        data: [<?php
                                $cnt = 0;
                                foreach ($show as $dt) {
                                    echo $dt->stok . ',';
                                } ?>],
                        label: "<?= $row->varietas_kedelai ?>",
                        borderColor: "<?= $color ?>",
                        fill: true
                    },
                <?php

                }
                ?>

            ]
        },
        options: {
            title: {
                display: true,
                text: 'Permintaan Kedelai Bulan ini'
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Kilogram'
                    }
                }
            }
        }
    });
</script>

<script>
    <?php
    $hari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    $this->db->where('bln', date('n'));
    $this->db->order_by('tgl', 'ASC');
    $this->db->from('grafik_selisih');
    $query = $this->db->get()->row_array();

    ?>
    new Chart(document.getElementById("line-selisih"), {
        type: 'line',
        data: {

            labels: [
                <?php
                for ($i = $query['tgl']; $i <= $hari; $i++) {
                    echo $i . ',';
                }
                ?>
            ],
            datasets: [
                <?php

                $count = 0;
                foreach ($grafik_selisih as $row) {
                    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
                    $color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];
                    $count = $count + 1;
                    $where = array(
                        'varietas_kedelai' => $row->varietas_kedelai,
                        'bln' => date('n')
                    );
                    $show = $this->Mod_auth->show_grafik_selisih($where);
                ?> {
                        data: [<?php
                                $cnt = 0;
                                foreach ($show as $dt) {
                                    echo $dt->stok . ',';
                                } ?>],
                        label: "<?= $row->varietas_kedelai ?>",
                        borderColor: "<?= $color ?>",
                        fill: true
                    },
                <?php

                }
                ?>

            ]
        },
        options: {
            title: {
                display: true,
                text: 'Permintaan Kedelai Bulan ini'
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Kilogram'
                    }
                }
            }
        }
    });
</script>