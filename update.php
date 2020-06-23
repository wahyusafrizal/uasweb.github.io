<?php  
	include_once 'konek.php';

	if (!isset($_GET['id_pembeli'])) {
		echo '<script>window.location="index.php";</script>';		
	}

	$id_pembeli = $_GET['id_pembeli'];
	$query_data = mysqli_query($konek, "SELECT * FROM tbl_pembeli WHERE id_pembeli = '$id_pembeli' " ) or die (mysqli_error($konek));
	$data_pembeli   = mysqli_fetch_assoc($query_data);
	$pilihan=explode(',',$data_pembeli['jenis_laminasi'])

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Ayo baca sesuatu yang menarik dari pengalaman saya">
    <link rel="stylesheet" href="css/style.css">
    <title>UAS</title>
    <style>
        html{
            background-image: url(foto/dig.jpg);
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <header>
    <img src="foto/logowahyu.png" alt="foto saya" width="250px" height="140px" >

        <ul class="tmenu">
                <li><a href="index.php" ><img src="foto/home.png" alt=""></a></li>
                <li><a href="tambah.php"> <img src="foto/contacts.png" alt=""></a> </li>
                <li><a href="update.php" class="active"><img src="foto/about.png" alt=""></a> </li>
                <li><a href="galeri.php"><img src="foto/galery.png" alt=""> </a> </li>
        </ul>       
    </header><hr>
    <section class="file-section">
	<center><h1 class="hh">FORM UPDATE DATA</h1></center>

<div class="menu">

	<hr >
<br><br>
<!-- Form input-->

<div class="menu2">
		<form action="" method="post">
        <table  width="50%" cellpadding="5px" align="center" border="0">
        <tr>
			<td align="left">
				<b>Merk Motor</b>
			</td> 
			<td>:</td>
			<td>
				<select name="motor" id="" style="width: 200px;">
				<?php
                    $data_mtr=$data_pembeli['merk_motor'];
                ?>
                    <option <?php if($data_mtr=='A') {echo "selected";} ?> value='A'>KAWASAKI</option>
                    <option <?php if($data_mtr=='B') {echo "selected";} ?> value='B'>HONDA</option>
                    <option <?php if($data_mtr=='C') {echo "selected";} ?> value='C'>SUZUKI</option>
					<option <?php if($data_mtr=='D') {echo "selected";} ?> value='D'>YAMAHA</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="left">
				<b>Nama</b>
			</td> 
			<td>:</td>
			<td>
				<input type="text" name="nama" value="<?= $data_pembeli['nama'];?>"  style="width: 200px;" required> 
			</td>
        </tr>
        <tr>
			<td align="left">
				<b>E-mail</b>
			</td> 
			<td>:</td>
			<td>
				<input type="email" name="email" value="<?= $data_pembeli['email'];?>" style="width: 200px;" required> 
			</td>
		</tr>
        <tr>
			<td width="30%" align="left">
				<b>Jenis Laminasi</b>
			</td> <!-- Colom -->
			<td>:</td>
			<td>
				<label><input type="checkbox" name="pil[]" <?php if(in_array(0, $pilihan)) echo "checked"; ?> value="0">Hologram</label><br>
                <label><input type="checkbox" name="pil[]" <?php if(in_array(1, $pilihan)) echo "checked"; ?> value="1">Super Glossy</label><br>
                <label><input type="checkbox" name="pil[]" <?php if(in_array(2, $pilihan)) echo "checked"; ?> value="2">3M</label><br>
			</td>
		</tr>

		<tr>
			<td align="left">
				<b>Jumlah</b>
			</td> 
			<td>:</td>
			<td>
				<input type="number" name="jumlah" value="<?= $data_pembeli['jumlah'];?>" min="0"  style="width: 200px;"> 
			</td>
		</tr>

		<tr>
			<td  align="left">
				<b>Jenis Motor</b>
			</td> 
			<td>:</td>
			<td>
				<label></label><input type="radio" name="jenis" value="SPORT"<?php if ($data_pembeli['jenis']=="SPORT") echo 'checked';?>> SPORT</label>
				<label></label><input type="radio" name="jenis" value="BEBEK"<?php if ($data_pembeli['jenis']=="BEBEK") echo 'checked';?>> BEBEK </label>
				<label></label><input type="radio" name="jenis" value="MATIC"<?php if ($data_pembeli['jenis']=="MATIC") echo 'checked';?>> MATIC </label>
			</td>
		</tr>
        <tr>
			<td>
				<b>Pengiriman</b>
			</td>
			<td>:</td>
			<td>
				<select name="kirim" id="" style="width: 200px;">
				<?php
                    $data_krm=$data_pembeli['pengiriman'];
                ?>
                    <option <?php if($data_krm=='A') {echo "selected";} ?> value='A'>JNE</option>
                    <option <?php if($data_krm=='B') {echo "selected";} ?> value='B'>J&T Expres</option>
                    <option <?php if($data_krm=='C') {echo "selected";} ?> value='C'>POS</option>
					<option <?php if($data_krm=='D') {echo "selected";} ?> value='D'>Si Cepat</option>
				</select>
			</td>
		</tr>

        <tr>
        <td align="left">
            <b>Keterangan Lain</b>
        </td>
        <td>:</td>
        <td>
        <textarea name="ket_lain" id="ket_lain" cols="30" rows="6"><?php echo $data_pembeli['ket_lain'];?> </textarea></td>
        </tr>
		<tr>
			<td colspan="2"></td>
			<td>
                <button type="submit" name="Update_data"> UPDATE</button>
                <button type="reset" name="reset"> RESET</button>
			</td>
		</tr>
		</div>
        </table>
		</form>
		</div>
	<br>
    </section>
    <hr>   
    <footer>             
    <table class="iklan"><tr>
	<td align="left" width="100px"></td>
        <td >Follow akun saya guys.... </td>      
        <td class="login"><a href="https://www.instagram.com/wahyurizal__/" target="_blank"><img src="foto/instagram-new.png" alt="Akun saya" width="40px" height="40px"></a></td> 
        <td><b>wahyurizal__</b></td>
        <td class="login"><a href="https://www.youtube.com/channel/UCSnLCGEV7AY3NsMEv2xxT_A" target="_blank"><img src="foto/youtube.png" alt="Akun saya" width="40px" height="40px"></a></td>
        <td> <b>WAHYU SAFRIZAL</b> </td>
        <td class="login"><a href="mailto:wahyusafrizal23@student.uir.ac.id" target="_blank"><img src="foto/gmail.png" 
                alt="Akun saya" width="40px" height="40px"></a></td>
        <td> <b>wahyusafrizal23@student.uir.ac.id</b> </td>
        </tr>
        </table>           
        <div class="footer-copyright">
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Wahyu Safrizal
        </div>
    </footer> 
</body>
</html>

<?php  

if (isset($_POST['motor']) && isset($_POST['jumlah']) && isset($_POST['jenis'])
&& isset($_POST['kirim']) && isset($_POST['ket_lain'])&& isset($_POST['nama']) && isset($_POST['email'])) {
		
        $merk_motor      = $_POST['motor'];
        $nama            = $_POST['nama'];
		$email           = $_POST['email'];
		$pil='';
		$jml_data=count($pil);
		$fokus_pil=$_POST['pil'];
		for($b=0;$b<count($_POST['pil']);$b++){
			$pil=$pil.$fokus_pil[$b].',';
		}
		$pil_to_sql=substr(strrev($pil),1);

        $jumlah          = $_POST['jumlah'];
        $jenis           = $_POST['jenis'];
        $pengiriman      = $_POST['kirim'];
		$keterangan_lain = $_POST['ket_lain'];
		$tanggal      	 = date ("Y-m-d H:i:s");
		$diskon = 0.05;
		$harga = 0;
		$total = 0;
		$ts = 0;
		$akhir = 0;

if ($merk_motor == 'A') {
		if ($jenis == 'SPORT'){
			$harga = 600000;
		}
		if ($jenis == 'MATIC'|| $jenis == 'BEBEK' ){
			$harga = 350000;
	}
}
if ($merk_motor == 'B') {
	if ($jenis == 'SPORT'){
		$harga = 500000;
	}
	if ($jenis == 'MATIC'|| $jenis == 'BEBEK' ){
		$harga = 300000;
}
}
if ($merk_motor == 'C') {
	if ($jenis == 'SPORT'){
		$harga = 450000;
	}
	if ($jenis == 'MATIC'|| $jenis == 'BEBEK' ){
		$harga = 450000;
}
}
if ($merk_motor == 'D') {
	if ($jenis == 'SPORT'){
		$harga = 800000;
	}
	if ($jenis == 'MATIC'|| $jenis == 'BEBEK' ){
		$harga = 600000;
}
}

$total = $harga*$jumlah;
$ts = $total*$diskon;
$akhir = $total-$ts;
   
	mysqli_query($konek, "UPDATE tbl_pembeli SET
							merk_motor = '$merk_motor',nama = '$nama',email = '$email',jenis_laminasi = '$pil_to_sql',
                            jumlah ='$jumlah',jenis ='$jenis',pengiriman = '$pengiriman',ket_lain = '$keterangan_lain',
							harga = '$harga',total = '$akhir',tanggal = '$tanggal'WHERE id_pembeli = '$id_pembeli'") 
							or die (mysqli_error($konek));	

	if (mysqli_affected_rows($konek) > 0) {
		echo '<script>alert("Data berhasil diedit");window.location="index.php";</script>';
	}
	else{
		echo '<script>alert("Data gagal diedit");</script>'		;
	}
}

?>

