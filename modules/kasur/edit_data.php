<?php
include "../layout/header.php";
?>

<div class="container mt-5">
    <p class="h2">Edit Data Barang</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Edit Data Barang</h4>
                            </div>
                            <div class="p-2 "><a href="kasur.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                        </div>
                        <hr>

                        <form action="edit_data_aksi.php" method="post" autocomplete="on">
                            <?php
                            include './../../config/koneksi.php';
                            require_once './../../config/fungsi_rupiah.php';

                            if (isset($_GET['id'])) {
                                $query = mysqli_query($koneksi, "select * from is_kasur where id='$_GET[id]'")
                                    or die('Ada kesalahan pada query tampil Data  : ' . mysqli_error($mysqli));
                                $d  = mysqli_fetch_assoc($query);
                            }
                            ?>
                            <div class="container mt-3">
                                <table class="text-start">
                                    <tr>
                                        <td><label for="ex1" class="">Kode Barang</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="kode_kasur" required="required" value="<?php echo $d['kode_kasur']; ?>" readonly>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Nama Barang</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="nama_kasur" value="<?php echo $d['nama_kasur']; ?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="jenis_kasur" class="form-label">Jenis Kasur</label></td>
                                        <td>
                                            <div class="p-2 g-col-6">
                                                <select class="form-select" name="jenis_kasur" id="jenis_kasur" class="select_value" data-placeholder="-- Pilih --" autocomplete="on" required>
                                                <option value="<?php echo $d['jenis_kasur']; ?>"selected><?php echo $d['jenis_kasur']; ?></option>
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
                                                <select class="form-select" name="ukuran_kasur" id="ukuran_kasur" class="select_value" data-placeholder="-- Pilih --" autocomplete="on" required>
                                                <option value="<?php echo $d['ukuran_kasur']; ?>"selected><?php echo $d['ukuran_kasur']; ?></option>
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
                                                    <input type="numeric" class="form-control" id="harga_beli" name="harga_beli" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah($d['harga_beli']); ?>" required>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Harga Jual</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input type="numeric" class="form-control" id="harga_jual" name="harga_jual" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo format_rupiah($d['harga_jual']); ?>" required>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Stok</label></td>
                                        <td>
                                            <div class="form-group row p-2 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="numeric" name="stok" value="<?php echo $d['stok']; ?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="satuan" class="form-label">Satuan</label></td>
                                        <td>
                                            <div class="mb-3 p-2 g-col-6">
                                                <select class="form-select" name="satuan" id="satuan" class="select_value" data-placeholder="-- Pilih --" autocomplete="on" required>
                                                    <option value="<?php echo $d['satuan']; ?>"selected><?php echo $d['satuan']; ?></option>
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
                                            <button type="submit" class="btn btn-success" name="simpan">Submit</button>
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