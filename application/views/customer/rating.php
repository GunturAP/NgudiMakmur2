<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Feedback</title>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/flatly/bootstrap.min.css">
    <script src="https://use.fontawesome.com/5ac93d4ca8.js"></script>
    <script src="<?= base_url('assets/js/'); ?>bootstrap4-rating-input.js"></script>
    <style type="text/css">
        .container {
            margin: 150px auto;
            font-size: 20px;
        }
    </style>

</head>

<body>
    <center>
        <div class="container">
            <form method="post" action="<?= base_url('Customer/feedback_post') ?>" <h1>Penilaian Produk</h1>
                <p class="lead">Silahkan Beri Penilaian Untuk Produk Yang Telah Anda Beli, Kepuasan Pelanggan adalah Prioritas Kami</p>
                <?php
                $ft = unserialize($pesanan['foto_kedelai']);
                ?>
                <img width="240px" height="240px" src="<?= base_url('assets/img/produk/'); ?><?= $ft['0'] ?>">

                <div style="font-size: 76px;">
                    <p>
                        <input type="text" name="id_pesanan" value="<?= $pembeli['id_pesanan'] ?>" hidden>
                        <input type="text" name="id_kedelai" value="<?= $pesanan['id'] ?>" hidden>
                        <?php
                        $penjual = $this->db->get_where('data_penjual', ['email' => $pesanan['email']])->row_array();

                        ?>
                        <input type="text" name="id_penjual" value="<?= $penjual['id'] ?>" hidden>
                        <input type="text" name="email_pembeli" value="<?= $pembeli['email_pembeli'] ?>" hidden>
                        <input type="number" name="star" id="rating1" class="rating text-warning">

                    </p>
                </div>
                <p class="lead">Komentar Produk Yang di beli</p>
                <textarea rows="4" class="form-control" name="komentar" placeholder="Beri Komentar Tentang Pelayanan Penjual, Kualitas Produk, Pengemasan dll....."></textarea>
                <br>
                <br>
                <button type="submit" class="btn btn-outline-success btn-lg">Kirim Ulasan</button>
            </form>
        </div>
    </center>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
    <script>
        try {
            fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
                method: 'HEAD',
                mode: 'no-cors'
            })).then(function(response) {
                return true;
            }).catch(function(e) {
                var carbonScript = document.createElement("script");
                carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
                carbonScript.id = "_carbonads_js";
                document.getElementById("carbon-block").appendChild(carbonScript);
            });
        } catch (error) {
            console.log(error);
        }
    </script>
</body>

</html>