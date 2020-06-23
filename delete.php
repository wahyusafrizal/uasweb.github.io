<?php 
	include_once 'konek.php';
	if (!isset($_GET['id_pembeli'])) {
		echo '<script>window.location="index.php";</script>';		
	}
	$id_pembeli = $_GET['id_pembeli'];

	mysqli_query($konek, "DELETE FROM tbl_pembeli WHERE id_pembeli = '$id_pembeli' " ) or die (mysqli_error($konek));

	if (mysqli_affected_rows($konek) > 0) {
		echo '<script>alert("Data berhasil dihapus");window.location="index.php";</script>'		;
	}
	else{
		echo '<script>alert("Data gagal dihapus");window.location="index.php";</script>'		;
	}

/*hapus foto*/
	if (!isset($_GET['id_foto'])) {
		echo '<script>window.location="galeri.php";</script>';		
	}
	$id_foto = $_GET['id_foto'];
	$pilih = mysqli_query($konek, "SELECT *FROM galeri WHERE id_foto = '$id_foto' " );
	$data = mysqli_fetch_array($pilih);
	$foto = $data['nama'];
	unlink("foto/".$foto);

	$hapus = mysqli_query($konek, "DELETE FROM galeri WHERE id_foto = '$id_foto' " ) or die (mysqli_error($konek));

	if ($hapus > 0) {
		echo '<script>alert("Foto berhasil dihapus");window.location="galeri.php";</script>';
	}
	else{
		echo '<script>alert("Foto gagal dihapus");window.location="galeri.php";</script>';
	}
?>