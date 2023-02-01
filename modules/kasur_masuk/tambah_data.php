<?php
include "../layout/header.php";
?>

<div class="container mt-5">
    <p class="h2">Tambah Jenis Kasur</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Tambah Jenis Kasur</h4>
                            </div>
                            <div class="p-2 "><a href="jenis_kasur.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                        </div>
                        <hr>

                        <form action="tambah_data_aksi.php" method="POST">
                            <?php
                            include './../../config/koneksi.php';
                            $query = mysqli_query($koneksi, "SELECT max(kode_transaksi) as kodeTerbesar FROM is_barang_masuk");
                            $data = mysqli_fetch_array($query);
                            $kodeBarang = $data['kodeTerbesar'];

                            $urutan = (int) substr($kodeBarang, 4, 4);

                            $urutan++;
                            $huruf = "TM-";
                            $kodeBarang = $huruf . sprintf("%04s", $urutan);
                            ?>
                            <div class="container mt-3">
                                <table class="text-start">
                                    <tr>
                                        <td><label for="ex1" class="">Kode Transaksi</label></td>
                                        <td>
                                            <div class="form-group row p-3 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="kode_transaksi" value="<?php echo $kodeBarang ?>" readonly required />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Tanggal Transaksi</label></td>
                                        <td>
                                            <div class="form-group row p-3 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="tgl_input" value="<?php echo date("d-m-Y"); ?>" readonly required>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="nama_barang" class="">Nama Supplier</label></td>
                                        <td>
                                            <div class="p-2 g-col-6">
                                                <select class="form-select" name="kode_supplier" id="kode_supplier" class="select_value" data-placeholder="-- Pilih --" autocomplete="off" required>
                                                    <option value="---- PILIH ----" disabled selected>---- PILIH ----</option>
                                                    <?php
                                                    include './../../config/koneksi.php';
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM is_supplier");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $data['kode_supplier'] ?>"><?= $data['kode_supplier'] ?> | <?= $data['nama_supplier'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="nama_barang" class="">Nama Barang</label></td>
                                        <td>
                                            <div class="p-2 g-col-6">
                                                <select class="form-select" name="kode_kasur" id="kode_kasur" class="select_value" data-placeholder="-- Pilih --" autocomplete="off" required>
                                                    <option value="---- PILIH ----" disabled selected>---- PILIH ----</option>
                                                    <?php
                                                    include './../../config/koneksi.php';
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM is_kasur");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $data['kode_kasur'] ?>"><?= $data['kode_kasur'] ?> | <?= $data['nama_kasur'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Jumlah Masuk</label></td>
                                        <td>
                                            <div class="form-group row p-3 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="jumlah_masuk">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="satuan" class="form-label">Satuan</label></td>
                                        <td>
                                            <div class="mb-3 p-2 g-col-6">
                                                <select class="form-select" name="satuan" id="satuan" class="select_value" data-placeholder="-- Pilih --" autocomplete="off" required>
                                                    <option value="---- PILIH ----" disabled selected>---- PILIH ----</option>
                                                    <option>Pcs</option>
                                                    <option>Lusin</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="reset" value="Reset" class="btn btn-danger"/> <input type="submit" name="Submit" value="Submit" class="btn btn-success"/> 
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../layout/footer.php';
?>