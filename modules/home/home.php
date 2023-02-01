<?php
include "../layout/header.php";
?>

<div class="container mt-5">
    <h3>
        <center>SELAMAT DATANG</center>
    </h3>
    <hr>
    <?php
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
     
    echo tgl_indo(date('Y-m-d'));
    date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
    echo ' | <span id="jam" style="font-size:24"></span>'; 
    ?>

    <div class="position-relative">
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center mt-5">
                    <div class="card-body">
                        <h5 class="card-title">TOTAL KASUR</h5>
                        <?php
                        include './../../config/koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT COUNT(kode_kasur) as jumlah FROM is_kasur");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <h1><?php echo $d['jumlah']; ?></h1>
                        <?php
                        }
                        ?>

                        <a href="../kasur/kasur.php" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center mt-5">
                    <div class="card-body">
                        <h5 class="card-title">TOTAL SUPPLIER</h5>
                        <?php
                        include './../../config/koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT COUNT(kode_supplier) as jumlah FROM is_supplier");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <h1><?php echo $d['jumlah']; ?></h1>
                        <?php
                        }
                        ?>
                        <a href="../supplier/supplier.php" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center mt-5">
                    <div class="card-body">
                        <h5 class="card-title">TOTAL KASUR MASUK</h5>
                        <?php
                        include './../../config/koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_masuk");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <h1><?php echo $d['jumlah']; ?></h1>
                        <?php
                        }
                        ?>
                        <a href="../kasur_masuk/kasur_masuk.php" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center mt-5">
                    <div class="card-body">
                        <h5 class="card-title">TOTAL KASUR KELUAR</h5>
                        <?php
                        include './../../config/koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT COUNT(kode_transaksi) as jumlah FROM is_barang_keluar");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <h1><?php echo $d['jumlah']; ?></h1>
                        <?php
                        }
                        ?>
                        <a href="../kasur_keluar/kasur_keluar.php" class="btn btn-primary">Visit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>
    <?php
    include '../layout/footer.php';
    ?>