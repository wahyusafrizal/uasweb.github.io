<?php  
	include_once 'konek.php';
	$pil=array('Hologram','Super Glossy','3M');
	// Memanggil file koneksi database agar bisa menjalankan query di berbagai file
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
                <li><a href="index.php" class="active"><img src="foto/home.png" alt=""></a></li>
                <li><a href="tambah.php"> <img src="foto/contacts.png" alt=""></a> </li>
               <li><a href="galeri.php"><img src="foto/galery.png" alt=""> </a> </li>
        </ul>       
    </header><hr>
    <section class="profile-section">
        <table >
        <td><h1>Login </h1></td>
        <td>:</td>
            <td class="login"><a href="https://web.facebook.com/" target="_blank">
                <img src="foto/facebook-new.png" alt="Akun saya" width="40px" height="40px"></a>
            </td>
                <td class="login"><a href="https://web.instagram.com/" target="_blank">
                    <img src="foto/instagram-new.png" alt="Akun saya" width="40px" height="40px"></a> 
            </td>
                <td class="login"><a href="https://twitter.com/" target="_blank">
                    <img src="foto/twitter.png" alt="Akun saya" width="40px" height="40px"></a> 
            </td>
            <td class="login"><a href="https://web.whatsapp.com/" target="_blank">
                <img src="foto/whatsapp.png" alt="Akun saya" width="40px" height="40px"></a> 
            </td>
            <td class="login"><a href="https://mail.google.com/" target="_blank"><img src="foto/gmail.png" 
                alt="Akun saya" width="40px" height="40px"></a></td>  
        </table>
            <hr><br>
	<center><h1 class="hh">Tampilan data dari database</h1></center>
    <br>
	<table align="center" class="table">
    <thead>
    <th class="th">No.</th>
    <th class="th">Merk Motor</th>
    <th class="th">Nama</th>
    <th class="th">E-mail</th>	
    <th class="th">Jenis Laminasi</th>
	<th class="th">Jumlah</th>	
	<th class="th">Jenis Motor</th>
    <th class="th">Pengiriman</th>
	<th class="th">Keterangan Lain</th>
	<th class="th">Action</th>
	</thead>
		<tbody>

<?php  
	
	$no = 1;
	$query_tampil = mysqli_query($konek, "SELECT * FROM tbl_pembeli" ) or die (mysqli_error($konek));

	// Data yang didapat sesuai query nya akan dilooping otomatis
	while ($data_pembeli = mysqli_fetch_assoc($query_tampil)) {
?>

	<tr class="tr">
		<td class="td" align="center"><?= $no++; ?></td>
        <td align="center" class="td"><?php
                if ($data_pembeli['merk_motor']=='A'){
                    echo "KAWASAKI";
                }
                if ($data_pembeli['merk_motor']=='B'){
                    echo "HONDA";
                }
                if ($data_pembeli['merk_motor']=='C'){
                    echo "SUZUKI";
				}
				if ($data_pembeli['merk_motor']=='D'){
                    echo "YAMAHA";
                }
                else{
                    echo "";
                }

            ?></td>
        <td class="td" align="center"><?= $data_pembeli['nama']; ?></td>
        <td class="td" align="center"><?= $data_pembeli['email']; ?></td>
		<td align="center" class="td"><?php 
                $laminasi_tmp=explode(',',$data_pembeli['jenis_laminasi']);

                for ($c=0;$c<count($laminasi_tmp);$c++){
	                $satu_pil = $laminasi_tmp[$c];
	                echo $pil[$satu_pil].", ";
                };
                echo '</td>' ?>
		<td class="td" align="center"><?= $data_pembeli['jumlah']; ?></td>
        <td class="td" align="center"><?= $data_pembeli['jenis']; ?></td>
		<td align="center" class="td"><?php
                if ($data_pembeli['pengiriman']=='A'){
                    echo "JNE";
                }
                if ($data_pembeli['pengiriman']=='B'){
                    echo "J&T Expres";
                }
                if ($data_pembeli['pengiriman']=='C'){
                    echo "POS";
				}
				if ($data_pembeli['pengiriman']=='D'){
                    echo "Si Cepat";
                }
                else{
                    echo "";
                }
            ?></td>
        <td class="td" align="center"><?= $data_pembeli['ket_lain']; ?></td>
		<td align="center" class="td">
			<a href="update.php?id_pembeli=<?= $data_pembeli['id_pembeli'];  ?>">Edit </a> |
			<a class="del" href="delete.php?id_pembeli=<?= $data_pembeli['id_pembeli'];  ?>" onclick="return confirm
            ('Apakah anda yakin ingin menghapus data ini ?')" ><b> X</b> </a> 
		</td>
</tr>
 
<?php  
	}
?>	

		</tbody>
    </table>
    <br><br>
<table align="center" class="table" >
<center><h1 class="hh">Data Transaksi</h1></center>
<thead>
    <th class="th">No.</th>
    <th class="th">Tanggal</th>
    <th class="th">Nama</th>
    <th class="th">Diskon</th>
    <th class="th">Harga</th>
    <th class="th">Jumlah</th>
    <th class="th">Total</th>
</thead>
<tbody>
<?php  
	
	$no = 1;
	$query_tampil = mysqli_query($konek, "SELECT * FROM tbl_pembeli" ) or die (mysqli_error($konek));

	// Data yang didapat sesuai query nya akan dilooping otomatis
	while ($data_pembeli = mysqli_fetch_assoc($query_tampil)) {
?>
<tr class="tr">
		<td class="td" align="center"><?= $no++; ?></td>
        <td class="td" align="center"><?= $data_pembeli['tanggal']; ?></td>
        <td class="td" align="center"><?= $data_pembeli['nama']; ?></td>
        <td class="td" align="center"><?= '5%'; ?></td>
        <td class="td" align="center"> Rp.<?= number_format($data_pembeli['harga']); ?></td>
        <td class="td" align="center"><?= $data_pembeli['jumlah']; ?></td>
        <td class="td" align="center">Rp.<?= number_format($data_pembeli['total']); ?></td>
</tr>	
<?php
    }
?>
</tbody>
</table>
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