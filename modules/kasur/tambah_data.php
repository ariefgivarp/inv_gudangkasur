<?php
include "../layout/header.php";
?>

<div class="container mt-5">
    <p class="h2">Tambah Data Barang</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Tambah Data Barang</h4>
                            </div>
                            <div class="p-2 "><a href="kasur.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                        </div>
                        <hr>

                        <form action="tambah_data_aksi.php" method="post">
                            <?php
                            include './../../config/koneksi.php';
                            require_once './../../config/fungsi_rupiah.php';

                            $query = mysqli_query($koneksi, "SELECT max(kode_kasur) as kodeTerbesar FROM is_kasur");
                            $data = mysqli_fetch_array($query);
                            $kodeBarang = $data['kodeTerbesar'];

                            $urutan = (int) substr($kodeBarang, 4, 4);

                            $urutan++;
                            $huruf = "KSR";
                            $kodeBarang = $huruf . sprintf("%04s", $urutan);

                            ?>
                            <div class="container mt-3">
                                <table class="text-start">
                                    <tr>
                                        <td><label for="ex1" class="">Kode Barang</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="kode_kasur" required="required" value="<?php echo $kodeBarang ?>" readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Nama Barang</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="nama_kasur">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="jenis_kasur" class="form-label">Jenis Kasur</label></td>
                                        <td>
                                            <div class="p-2 g-col-6">
                                                <select class="form-select" name="jenis_kasur" id="jenis_kasur" class="select_value" data-placeholder="-- Pilih --" autocomplete="off" required>
                                                <option value="---- PILIH ----" disabled selected>---- PILIH ----</option>
                                                    <?php
                                                    include './../../config/koneksi.php';
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM is_jeniskasur");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $data['jenis_kasur'] ?>"><?= $data['jenis_kasur'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ukuran_kasur" class="form-label">Ukuran Kasur</label></td>
                                        <td>
                                            <div class="p-2 g-col-6">
                                                <select class="form-select" name="ukuran_kasur" id="ukuran_kasur" class="select_value" data-placeholder="-- Pilih --" autocomplete="off" required>
                                                <option value="---- PILIH ----" disabled selected>---- PILIH ----</option>
                                                    <?php
                                                    include './../../config/koneksi.php';
                                                    $sql = mysqli_query($koneksi, "SELECT * FROM is_ukurankasur");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $data['ukuran_kasur'] ?>"><?= $data['ukuran_kasur'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Harga Beli</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input type="numeric" class="form-control" id="harga_beli" name="harga_beli" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Harga Jual</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input type="numeric" class="form-control" id="harga_jual" name="harga_jual" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
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
                                            <button class="btn btn-danger" type="reset" onclick="location.href='kasur.php'">Cancel</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success" name="submit">Submit</button>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="tgl_input" value="<?php echo date("d-m-Y"); ?>">

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