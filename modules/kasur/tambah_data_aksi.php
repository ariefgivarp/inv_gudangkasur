<?php

include("./../../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){

    $kode_kasur  = mysqli_real_escape_string($mysqli, trim($_POST['kode_kasur']));
    $nama_kasur  = mysqli_real_escape_string($mysqli, trim($_POST['nama_kasur']));
    $harga_beli = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_beli'])));
    $harga_jual = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['harga_jual'])));
    $satuan     = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));
    // ambil data dari formulir
    $kode_kasur = $_POST['kode_kasur'];
    $nama_kasur = $_POST['nama_kasur'];
    $jenis_kasur = $_POST['jenis_kasur'];
    $ukuran_kasur = $_POST['ukuran_kasur'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $satuan = $_POST['satuan'];
    $stok = $_POST['stok'];

    // buat query
    $sql = "insert into is_kasur values('', '$kode_kasur', '$nama_kasur', '$jenis_kasur', '$ukuran_kasur', '$harga_beli', '$harga_jual', '$satuan', '$stok', NOW())";
    $query = mysqli_query($koneksi, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: kasur.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: tambah_data.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>