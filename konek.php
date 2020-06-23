<?php  

	$servername  = "localhost";
	$username_db = "root";
	$password_db = "";
	$nama_db     = "data_pembeli";

	$konek = mysqli_connect($servername, $username_db, $password_db, $nama_db);

	if ($konek->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>