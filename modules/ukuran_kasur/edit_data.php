<?php
include "../layout/header.php";
?>

<div class="container mt-5">
    <p class="h2">Edit Ukuran Kasur</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Edit Ukuran Kasur</h4>
                            </div>
                            <div class="p-2 "><a href="ukuran_kasur.php" class="fa fa-undo" style="text-decoration:none"> Kembali</a></button></div>
                        </div>
                        <hr>
                        <?php
                        include './../../config/koneksi.php';

                        if (isset($_GET['id'])) {
                            $query = mysqli_query($koneksi, "select * from is_ukurankasur where id='$_GET[id]'")
                                or die('Ada kesalahan pada query tampil Data  : ' . mysqli_error($mysqli));
                            $d  = mysqli_fetch_assoc($query);
                        }
                        ?>
                        <form action="edit_data_aksi.php" method="post" autocomplete="on">
                            <div class="container mt-3">
                                <table class="text-start">
                                    <tr>
                                        <td><input type="hidden" name="id" value="<?php echo $d['id']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="ex1" class="">Ukuran Kasur</label></td>
                                        <td>
                                            <div class="form-group row p-3 g-col-6">
                                                <div class="col-xs-3">
                                                    <input class="form-control" type="text" name="ukuran_kasur" value="<?php echo $d['ukuran_kasur']; ?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btn btn-danger" type="reset" onclick="location.href='jenis_kasur.php'">Cancel</button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success" name="simpan">Submit</button>
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