<?php
if ($_POST['Submit'] == "Submit") {
	$kode_kasur			= $_POST['kode_kasur'];
	$kode_transaksi		= $_POST['kode_transaksi'];
	$jumlah_masuk		= $_POST['jumlah_masuk'];
    $kode_supplier		= $_POST['kode_supplier'];
    $satuan		= $_POST['satuan'];

	include './../../config/koneksi.php';
	$selSto = mysqli_query($koneksi, "SELECT * FROM is_kasur WHERE kode_kasur='$kode_kasur'");
	$sto    = mysqli_fetch_array($selSto);
	$stok	= $sto['stok'];
	//menghitung sisa stok
	$sisa	= $stok + $jumlah_masuk;

	if ($stok == $jumlah_masuk) {
?>
		<script language="JavaScript">
			alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
			document.location = 'tambah_data.php';
		</script>
		<?php
	}
	//proses	
	else {
		$insert = mysqli_query($koneksi, "INSERT INTO is_barang_masuk (kode_transaksi, kode_kasur, tgl_input, jumlah_masuk, kode_supplier, satuan) VALUES ('$kode_transaksi', '$kode_kasur', NOW(), '$jumlah_masuk', '$kode_supplier', '$satuan')");
		if ($insert) {
			//update stok
			$upstok = mysqli_query($koneksi, "UPDATE is_kasur SET stok='$sisa' WHERE kode_kasur='$kode_kasur'");
		?>
			<script language="JavaScript">
				alert('Good! Input Kasur Masuk berhasil ...');
				document.location = 'kasur_masuk.php';
			</script>
<?php
		} else {
			echo "<div><b>Oops!</b> 404 Error Server.</div>";
		}
	}
}
?>