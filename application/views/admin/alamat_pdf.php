<!DOCTYPE html>
<html>
<hea>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title><?= $pesanan['id_pesanan'] ?></title>
</hea d>

<body>
    <div style="font-size: 16px">
        <center>
            <h4>Jasa Pengiriman &nbsp; : <?= $pesanan['jasa_pengiriman'] ?></h4>
        </center>
        <div class="row">
            <div class="col-lg-4">
                <table class="table table-sm">
                    <tr>
                        <td colspan="3">
                            <h3><b>Penerima</b></h3>
                        </td>
                    </tr>
                    <tr>
                        <td width="5%" align="right"> Nama&nbsp;&nbsp;:</td>
                        <td width="20%"><?= $pesanan['nama_penerima'] ?></td>
                    </tr>
                    <tr>
                        <td width="2%" align="right">Alamat </i>&nbsp;&nbsp;:</td>
                        <td width="20%"><?= $pesanan['alamat_penerima'] ?></td>
                    </tr>
                    <tr>
                        <td width="2%" align="right">Telepon</i>&nbsp;&nbsp;:</td>
                        <td width="20%">+62<?= $pesanan['no_telepon'] ?></td>
                    </tr>
                    <tr>
                        <td width="2%" align="right">Detail</i>&nbsp;&nbsp;:</td>
                        <td width="20%"><?= $pesanan['nama_kedelai'] ?> ( <?= $pesanan['jumlah'] ?> Kg )</td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-4">
                <table class="table table-sm">
                    <tr>
                        <td colspan="3">
                            <h3><b>Pengirim</b></h3>
                        </td>
                    </tr>
                    <tr>
                        <td width="5%" align="right"> Nama&nbsp;&nbsp;:</td>
                        <td width="20%"><?= $pengirim['nama_penjual'] ?></td>
                    </tr>
                    <tr>
                        <td width="2%" align="right">Alamat </i>&nbsp;&nbsp;:</td>
                        <td width="20%"><?= $pengirim['detail_lainnya']?>, <?= $pengirim['kecamatan']?>,
                            <?= $pengirim['kota_kab']?></td>
                    </tr>
                    <tr>
                        <td width="2%" align="right">Telepon</i>&nbsp;&nbsp;:</td>
                        <td width="20%">+62<?= $pengirim['no_telepon']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>