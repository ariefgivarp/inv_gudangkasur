<?php
include './../../config/koneksi.php';
require_once './../../config/fungsi_rupiah.php';
       
if(isset($_POST['simpan'])){
    // ambil data dari formulir
        $kode_kasur  = mysqli_real_escape_string($koneksi, trim($_POST['kode_kasur']));
        $nama_kasur  = mysqli_real_escape_string($koneksi, trim($_POST['nama_kasur']));
        $jenis_kasur  = mysqli_real_escape_string($koneksi, trim($_POST['jenis_kasur']));
        $ukuran_kasur  = mysqli_real_escape_string($koneksi, trim($_POST['ukuran_kasur']));
        $harga_beli = str_replace('.', '', mysqli_real_escape_string($koneksi, trim($_POST['harga_beli'])));
        $harga_jual = str_replace('.', '', mysqli_real_escape_string($koneksi, trim($_POST['harga_jual'])));
        $satuan     = mysqli_real_escape_string($koneksi, trim($_POST['satuan']));
        $stok     = mysqli_real_escape_string($koneksi, trim($_POST['stok']));

        // buat query update
        $sql = "UPDATE is_kasur SET nama_kasur='$nama_kasur', jenis_kasur='$jenis_kasur', ukuran_kasur='$ukuran_kasur', harga_beli='$harga_beli', harga_jual='$harga_jual', satuan='$satuan', stok='$stok' WHERE kode_kasur = '$kode_kasur'";
        $query = mysqli_query($koneksi, $sql);

        // apakah query update berhasil?
        if( $query ) {
            // kalau berhasil, dialihkan ke:
            header('Location: kasur.php');
        } else {
            // kalau gagal tampilkan pesan
            die("Gagal menyimpan perubahan...");
        }


    } else {
        die("Akses dilarang...");
    }

?>