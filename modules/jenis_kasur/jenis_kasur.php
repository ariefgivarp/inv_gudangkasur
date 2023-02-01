<?php
include "../layout/header.php";
?>

<div class="container mt-5">
    <p class="h2">Jenis Kasur</p>

    <div class="position-relative">
        <div class="row">
            <div class="col">
                <div class="card text-center mt-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div class="p-2">
                                <h4>Tabel Jenis Kasur</h4>
                            </div>
                            <div class="p-2 "><a href="tambah_jenis.php" class="fa fa-plus" style="text-decoration:none"> Tambah Data</a></button></div>
                        </div>
                        <hr>
                        <div class="container mt-3">
                            <table class="table" id="tabel-data" >
                                <thead class="table-primary" style="font-size:90%">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Kasur</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include './../../config/koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM is_jeniskasur ORDER BY jenis_kasur asc");
                                    while ($d = mysqli_fetch_array($data)) {

                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['jenis_kasur']; ?></td>
                                            <td>
                                                <a data-toggle="tooltip" data-placement="top" title="edit" href="edit_jenis.php?id=<?php echo $d['id']; ?>"><span class="fa fa-pencil-square"></span></a>

                                                <a data-toggle="tooltip" data-placement="top" title="Hapus" href="hapus_jenis.php?id=<?php echo $d['id']; ?>"><span class="fa fa-trash"></span></a>
                                            </td>
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