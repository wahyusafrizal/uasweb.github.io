<?php  
	include_once 'konek.php';
	$pil=array('Hologram','Super Glossy','3M');
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
                <li><a href="tambah.php" class="active"> <img src="foto/contacts.png" alt=""></a> </li>
                <li><a href="galeri.php"><img src="foto/galery.png" alt=""> </a> </li>
        </ul>       
    </header><hr>
<section class="file-section">
	<center><h1 class="hh">FORM PEMESANAN DECAL MOTOR</h1></center>
	<div class="menu">
	<hr >
<br><br>
<!-- Form input-->
<div class="menu2">
<table  width="50%" cellpadding="5px" align="center" border="0">
		<form action="" method="post">
        
        <tr>
			<td align="left" width="130px">
				<b>Merk Motor</b>
			</td> 
			<td width="15px">:</td>
			<td>
				<select name="motor" id="" style="width: 200px;">
					<option value="A">KAWASAKI</option>
					<option value="B">HONDA</option>
					<option value="C">SUZUKI</option>
                    <option value="D">YAMAHA</option>
				</select>
			</td>
		</tr>
		<tr>
			<td  width="300px">
				<b>Nama</b>
			</td> 
			<td width="15px">:</td>
			<td>
				<input type="text" name="nama"  style="width: 200px;" required>
			</td>
        </tr>
        <tr>
			<td width="2000px">
				<b>E-mail</b>
			</td> 
			<td width="15px">:</td>
			<td>
				<input type="email" name="email" style="width: 200px;" required> 
			</td>
		</tr>
        <tr>
			<td width="2000px" height="30%">
				<b>Jenis Laminasi</b>
			</td> <!-- Colom -->
			<td width="15px">:</td>
			<td>
				<?php 
                    for ($a=0;$a<count($pil);$a++) {
                        if(!empty($_GET['id_pembeli'])){
                            if(is_pil_selected($a,$_GET['id_pembeli'])==1){
                                echo '<input type="checkbox"  name="pil[]" value="'.$a.'" checked ="checked" />'.$pil[$a].'<br/>';}
                            else {
                                echo '<input type="checkbox"  name="pil[]" value="'.$a.'"/>'.$pil[$a].'<br/>';
                            }
                        } 
                        else {
                            echo '<input type="checkbox"  name="pil[]" value="'.$a.'" />'.$pil[$a].'<br/>';
                        }			
                    }	
                ?>
			</td>
		</tr>

		<tr>
			<td  width="200px">
				<b>Jumlah</b>
			</td> 
			<td width="15px">:</td>
			<td>
				<input type="number" name="jumlah" min="0" value="1" style="width: 200px;"> 
			</td>
		</tr>

		<tr>
			<td  align="left" width="130px">
				<b>Jenis Motor</b>
			</td> 
			<td width="15px">:</td>
			<td>
				<input type="radio" name="jenis" value="SPORT" required> SPORT
				<input type="radio" name="jenis" value="BEBEK"> BEBEK
				<input type="radio" name="jenis" value="MATIC"> MATIC
			</td>
		</tr>
        <tr>
			<td width="200px">
				<b>Pengiriman</b>
			</td>
			<td width="15px">:</td>
			<td>
				<select name="kirim" id="" style="width: 200px;">
					<option value="A">JNE</option>
					<option value="B">J&T Expres</option>
					<option value="C">POS</option>
                    <option value="D">Si Cepat</option>
				</select>
			</td>
		</tr>

        <tr>
        <td width="2000px">
            <b>Keterangan Lain</b>
        </td>
        <td width="15px">:</td>
        <td>
        <textarea name="ket_lain" id="" cols="30" rows="6"></textarea></td>
        </tr>
		<tr>
			<td colspan="2"></td>
			<td>
                <button type="submit" name="simpan_data"> PESAN</button>
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
		
	mysqli_query($konek, "INSERT INTO tbl_pembeli
							(id_pembeli,merk_motor,nama,email,jenis_laminasi,jumlah,jenis,pengiriman,ket_lain,
							harga,total,tanggal)
							VALUES ('','$merk_motor','$nama','$email','$pil_to_sql','$jumlah','$jenis','$pengiriman',
							'$keterangan_lain','$harga','$akhir','$tanggal')" ) or die (mysqli_error($konek));							

	if (mysqli_affected_rows($konek) > 0) {
		echo '<script>alert("Data berhasil ditambahkan");window.location="index.php";</script>';
	}
	else{
		echo '<script>alert("Data gagal ditambahkan");</script>';
	}

}

?>

