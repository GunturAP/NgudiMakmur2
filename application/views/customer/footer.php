<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright &copy; <?= date('Y') ?>

                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin untuk keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih Keluar untuk mengakhiri sesi anda.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?php echo base_url('auth/logout'); ?>//<?php echo 'email3' ?>">Keluar</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sialhkan Masuk ke Akun Anda</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Silahkan Pilih Masuk/Daftar untuk bisa melakukan transaksi.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?php echo base_url('auth'); ?>">Masuk / Daftar</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url('assets/store/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/store/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="<?= base_url('assets/store/'); ?>assets/js/custom.js"></script>
<script src="<?= base_url('assets/store/'); ?>assets/js/owl.js"></script>
<script src="<?= base_url('assets/store/'); ?>assets/js/slick.js"></script>
<script src="<?= base_url('assets/store/'); ?>assets/js/isotope.js"></script>
<script src="<?= base_url('assets/store/'); ?>assets/js/accordions.js"></script>


<script language="text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t) { //declaring the array outside of the
        if (!cleared[t.id]) { // function makes it static and global
            cleared[t.id] = 1; // you could use true and false, but that's more typing
            t.value = ''; // with more chance of typos
            t.style.color = '#fff';
        }
    }
</script>

<script>
    $('.btn-number').click(function(e) {
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function() {
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }
    });

    $(".input-number").keydown(function(e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
<script>
    document.getElementById('id_kota').addEventListener('change', function() {
        console.log()
        $w = 'id_kt_' + this.value
        $a = document.getElementById($w).innerHTML
        document.getElementById('kota').value = $a
    })
</script>
<script>
    function total() {
        var hrg = Number(document.getElementById('harga_produk').value)
        var ongkir = Number(document.getElementById('hrgongkir').innerHTML)
        var bnyk = Number(document.getElementById('banyak').value)
        var total_pesanan = hrg * bnyk
        var total_ongkir = ongkir * bnyk
        var total_pembayaran = total_pesanan + total_ongkir


        let textpesanan = total_pesanan.toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR"
        });
        let textongkir = total_ongkir.toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR"
        });
        let texttotal = total_pembayaran.toLocaleString("id-ID", {
            style: "currency",
            currency: "IDR"
        });

        document.getElementById('total_pesanan').innerHTML = textpesanan
        document.getElementById('total').innerHTML = texttotal
        document.getElementById('modal_total').innerHTML = texttotal
        document.getElementById('total_pesanan1').innerHTML = textpesanan
        document.getElementById('total1').innerHTML = textongkir

        document.getElementById('input_pesanan').value = total_pesanan
        document.getElementById('input_ongkir').value = total_ongkir
        document.getElementById('input_total').value = total_pembayaran
        document.getElementById('input_banyak').value = bnyk
    }

    function jasa() {

        var jasa_pengiriman = document.getElementById('jasa_pengiriman').value
        document.getElementById('input_jasa').value = jasa_pengiriman
        document.getElementById("form").submit();

        console.log(jasa_pengiriman);


    }
</script>
<script>
    $("#file-1").fileinput({
        theme: 'fa',
        uploadUrl: '#',
        allowedFileExtensions: ['jpg', 'png', 'gif'],
        overwriteInitial: false,
        maxFileSize: 2000,
        maxFilesNum: 10,
        slugCallback: function(filename) {
            return filename.replace('(', '_').replace(']', '_');
        }
    });
</script>


</body>

</html>