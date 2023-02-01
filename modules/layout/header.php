<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo "Anda harus login dulu <br><a href='../../index.php'>Klik disini</a>";
    exit;
}

$id_user = $_SESSION["id_user"];
$user = $_SESSION["user"];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2A3F54;">
        <div class="container-xxl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="../home/home.php">CV. BASIK</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../home/home.php"><i class="fa fa-home"></i> BERANDA</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-file"></i> DATA BARANG</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../kasur/kasur.php">Data Kasur</a></li>
                            <li><a class="dropdown-item" href="../ukuran_kasur/ukuran_kasur.php">Tambah Ukuran Kasur</a></li>
                            <li><a class="dropdown-item" href="../jenis_kasur/jenis_kasur.php">Tambah Jenis Kasur</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../supplier/supplier.php"><i class="fa fa-user"></i> DATA SUPPLIER</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa fa-print"></i> LAPORAN</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../kasur_masuk/kasur_masuk.php">Data Barang masuk</a></li>
                            <li><a class="dropdown-item" href="../kasur_keluar/kasur_keluar.php">Data Barang Keluar</a></li>
                            <li><a class="dropdown-item" href="../cetak/cetak_barang_masuk.php">Cetak Barang Masuk</a></li>
                            <li><a class="dropdown-item" href="../cetak/cetak_barang_keluar.php">Cetak Barang Keluar</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
            </div>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="./../../assets/img/av.png" alt="hugenerd" width="40" height="40" class="rounded-circle">
                    <span class="d-none d-sm-inline mx-1">USERS</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="../users/logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">