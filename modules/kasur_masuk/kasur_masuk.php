<?php
include "../layout/header.php";
?>

<div class="container mt-5">
    <p class="h2">Data Barang Masuk</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Tabel Data Barang Masuk</h4>
                            </div>
                            <div class="p-2 "><a href="tambah_data.php" class="fa fa-plus" style="text-decoration:none"> Tambah Data</a></button></div>
                        </div>
                        <hr>
                        <div class="container mt-3">
                            <table class="table table-bordered border-primary" id="tabel-data">
                                <thead class="table-primary" style="font-size:90%">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal Input</th>
                                        <th>Nama Supplier</th>
                                        <th>Jumlah Masuk</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include './../../config/koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT is_barang_masuk.kode_transaksi, is_barang_masuk.tgl_input, is_kasur.nama_kasur, is_barang_masuk.jumlah_masuk, is_supplier.nama_supplier, is_barang_masuk.satuan FROM is_barang_masuk 
                                    inner join is_kasur on is_kasur.kode_kasur = is_barang_masuk.kode_kasur 
                                    inner join is_supplier on is_supplier.kode_supplier = is_barang_masuk.kode_supplier ORDER BY id_bm DESC");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['kode_transaksi']; ?></td>
                                            <td><?php echo $d['nama_kasur']; ?></td>
                                            <td><?php echo $d['tgl_input']; ?></td>
                                            <td><?php echo $d['nama_supplier']; ?></td>
                                            <td><?php echo $d['jumlah_masuk']; ?></td>
                                            <td><?php echo $d['satuan']; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <script>
                                    $(document).ready(function() {
                                        $('#tabel-data').DataTable();
                                    });
                                </script>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../layout/footer.php';
?>