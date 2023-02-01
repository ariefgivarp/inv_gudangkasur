<?php

include './../../config/koneksi.php';

if( isset($_GET['id_kasur']) ){

    // ambil id dari query string
    $id = $_GET['id_kasur'];

    // buat query hapus
    $sql = "DELETE FROM is_kasur WHERE id_kasur=$id_kasur";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: kasur.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>