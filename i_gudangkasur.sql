-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2023 pada 14.18
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i_gudangkasur`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_barang_keluar`
--

CREATE TABLE `is_barang_keluar` (
  `id_bk` int(10) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_kasur` varchar(10) NOT NULL,
  `tgl_input` date NOT NULL,
  `jumlah_keluar` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `is_barang_keluar`
--

INSERT INTO `is_barang_keluar` (`id_bk`, `kode_transaksi`, `kode_kasur`, `tgl_input`, `jumlah_keluar`, `satuan`) VALUES
(3, 'TMK-0001', 'KSR0001', '2023-01-05', 1000, 'Pcs'),
(4, 'TMK-0002', 'KSR0001', '2023-01-05', 1000, 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_barang_masuk`
--

CREATE TABLE `is_barang_masuk` (
  `id_bm` int(10) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `kode_kasur` varchar(10) NOT NULL,
  `tgl_input` date NOT NULL,
  `jumlah_masuk` int(10) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `is_barang_masuk`
--

INSERT INTO `is_barang_masuk` (`id_bm`, `kode_transaksi`, `kode_kasur`, `tgl_input`, `jumlah_masuk`, `kode_supplier`, `satuan`) VALUES
(16, 'TM-0001', 'KSR0002', '2023-01-05', 1000, 'SPR0002', 'Pcs'),
(17, 'TM-0002', 'KSR0001', '2023-01-05', 1000, 'SPR0001', 'Pcs'),
(18, 'TM-0003', 'KSR0002', '2023-01-20', 1000, 'SPR0002', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_jeniskasur`
--

CREATE TABLE `is_jeniskasur` (
  `id` int(10) NOT NULL,
  `jenis_kasur` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `is_jeniskasur`
--

INSERT INTO `is_jeniskasur` (`id`, `jenis_kasur`) VALUES
(4, 'Latex'),
(5, 'Foam'),
(7, 'Spring Bed'),
(8, 'Memory Foa'),
(9, 'Hybrid'),
(10, 'Kapuk'),
(11, 'Angin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_kasur`
--

CREATE TABLE `is_kasur` (
  `id_kasur` int(10) NOT NULL,
  `kode_kasur` varchar(10) NOT NULL,
  `nama_kasur` varchar(20) NOT NULL,
  `jenis_kasur` varchar(20) NOT NULL,
  `ukuran_kasur` varchar(20) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `is_kasur`
--

INSERT INTO `is_kasur` (`id_kasur`, `kode_kasur`, `nama_kasur`, `jenis_kasur`, `ukuran_kasur`, `harga_beli`, `harga_jual`, `satuan`, `stok`, `tgl_input`) VALUES
(8, 'KSR0001', 'Kasur Busa M', 'Spring Bed', 'King: 180 x 200 cm', 150000, 200000, 'Pcs', 2100, '2023-01-05 11:19:23'),
(9, 'KSR0002', 'Kasur Busa L', 'Latex', 'King: 180 x 200 cm', 200000, 300000, 'Pcs', 4010, '2023-01-05 11:43:51'),
(10, 'KSR0003', 'Kasur Busa P', 'Hybrid', 'King: 180 x 200 cm', 5000000, 5500000, 'Pcs', 1000, '2023-01-05 12:33:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_supplier`
--

CREATE TABLE `is_supplier` (
  `id_supplier` int(10) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(20) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `is_supplier`
--

INSERT INTO `is_supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(3, 'SPR0001', 'Bima Jaya', '08887123332', 'Purbalingga, Jawa Tengah'),
(4, 'SPR0002', 'Multi Jaya Semesta', '0899872374', 'Purwokerto, Jawa Tengah'),
(5, 'SPR0003', 'Univerly Corp', '0218895', 'Jakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_ukurankasur`
--

CREATE TABLE `is_ukurankasur` (
  `id` int(10) NOT NULL,
  `ukuran_kasur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `is_ukurankasur`
--

INSERT INTO `is_ukurankasur` (`id`, `ukuran_kasur`) VALUES
(3, 'Queen: 160 x 200 cm'),
(4, 'King: 180 x 200 cm'),
(5, 'Super King: 200 x 20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_user`
--

CREATE TABLE `is_user` (
  `id_user` int(10) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `level` enum('admin','karyawan') NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `is_user`
--

INSERT INTO `is_user` (`id_user`, `user`, `pass`, `nama_user`, `level`, `no_telp`, `alamat`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '082326139996', 'purbalingga, jawa tengah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `is_barang_keluar`
--
ALTER TABLE `is_barang_keluar`
  ADD PRIMARY KEY (`id_bk`);

--
-- Indeks untuk tabel `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  ADD PRIMARY KEY (`id_bm`);

--
-- Indeks untuk tabel `is_jeniskasur`
--
ALTER TABLE `is_jeniskasur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `is_kasur`
--
ALTER TABLE `is_kasur`
  ADD PRIMARY KEY (`id_kasur`);

--
-- Indeks untuk tabel `is_supplier`
--
ALTER TABLE `is_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `is_ukurankasur`
--
ALTER TABLE `is_ukurankasur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `is_user`
--
ALTER TABLE `is_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `is_barang_keluar`
--
ALTER TABLE `is_barang_keluar`
  MODIFY `id_bk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  MODIFY `id_bm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `is_jeniskasur`
--
ALTER TABLE `is_jeniskasur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `is_kasur`
--
ALTER TABLE `is_kasur`
  MODIFY `id_kasur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `is_supplier`
--
ALTER TABLE `is_supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `is_ukurankasur`
--
ALTER TABLE `is_ukurankasur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `is_user`
--
ALTER TABLE `is_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
