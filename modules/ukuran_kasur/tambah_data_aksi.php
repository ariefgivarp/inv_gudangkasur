<?php

include("./../../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    $jenis_kasur  = mysqli_real_escape_string($mysqli, trim($_POST['ukuran_kasur']));
    
    // ambil data dari formulir

    $ukuran_kasur = $_POST['ukuran_kasur'];

    // buat query
    $sql = "insert into is_ukurankasur values('', '$ukuran_kasur')";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: ukuran_kasur.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tambah_data.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>