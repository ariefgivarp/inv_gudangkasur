<?php
include './../../config/koneksi.php';

if (isset($_POST['simpan'])) {
    // ambil data dari formulir
    $id  = mysqli_real_escape_string($koneksi, trim($_POST['id']));
    $ukuran_kasur  = mysqli_real_escape_string($koneksi, trim($_POST['ukuran_kasur']));


    // buat query update
    $sql = "UPDATE is_ukurankasur SET ukuran_kasur='$ukuran_kasur' WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ukuran_kasur.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}
