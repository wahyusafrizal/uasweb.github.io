<?php  
	include_once 'konek.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Ayo baca sesuatu yang menarik dari pengalaman saya">
    <link rel="stylesheet" href="css/style.css">
    <title>Upload foto anda</title>
    <style>
        html{
            background-image: url(foto/dig.jpg);
            background-size: 200%;
            background-repeat: no-repeat;
        }
    </style>
</head>
<header>
    <img src="foto/logowahyu.png" alt="foto saya" width="250px" height="140px" >
        <ul class="tmenu">
            <li><a href="index.php" ><img src="foto/home.png" alt=""></a></li>
            <li><a href="tambah.php"> <img src="foto/contacts.png" alt=""></a> </li>
            <li><a href="galeri.php" class="active"><img src="foto/galery.png" alt=""> </a> </li>
        </ul>
</header><hr>
<body>
<section class="sect">
    <center><h1 class="hh"><b>Galeri Saya</b></h1></center>
    <br>
    <hr>
    <table class="dc" cellpadding="5px" align="center" border="0">
    <form  action="" method="post" enctype="multipart/form-data">
        <tr>
        <td align="left" width="80px"></td>
        <td>Upload Foto : </td>
        <td><input type="file" name="file"></td>
        <td align="left" width="150px"></td>
        <td>Deskripsi Foto : </td>
        <td align="left" width="200px"><input type="text" name="deskripsi" placeholder="Description Photo"></td>
        <td><button type="submit" name="upload" >UPLOAD</button></td>
        <td align="left" width="80px"></td>
        </tr>   
    </form>
    </table>
    <hr>
    <br><br> 
<?php  
	$query_tampil = mysqli_query($konek, "SELECT * FROM galeri" ) or die (mysqli_error($konek));
	while ($data_pembeli = mysqli_fetch_assoc($query_tampil)) {
?>
    <div class="gallery">
    <a target="_blank" href="<?= "foto/".$data_pembeli['nama'];?>">
    <img src="<?= "foto/".$data_pembeli['nama'];?>" alt="">
    </a>
    <div class="desc"><?=$data_pembeli['deskripsi'];?></div><br>
    <center>
    <a class="del" href="delete.php?id_foto=<?= $data_pembeli['id_foto'];  ?>" onclick="return confirm
            ('Apakah anda yakin ingin menghapus data ini ?')" ><b>DELETE</b> </a>
    </center>
  </div>
<?php
    }
?>
</section><hr>
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
if (!isset($_POST['file']) && isset($_POST['deskripsi'])){
    $deskripsi = $_POST['deskripsi'];
    $nama_file = $_FILES['file']['name'];
    $ukuran_file = $_FILES['file']['size'];
    $tipe_file = array('png','jpg','jpeg');
    $tmp_file = $_FILES['file']['tmp_name'];
    $x = explode('.',$nama_file);
    $ekstensi = strtolower(end($x));
    if (in_array($ekstensi,$tipe_file)== true){
        if($ukuran_file<=2000000){
           if(move_uploaded_file($tmp_file,'foto/'.$nama_file)){
            $query = mysqli_query($konek,"INSERT INTO galeri (id_foto,nama,deskripsi) VALUES('','$nama_file','$deskripsi')"
            ) or die (mysqli_error($konek));
            if (mysqli_affected_rows($konek) > 0) {
                echo '<script>alert("Foto berhasil diupload");window.location="galeri.php";</script>';
            }
            else{
                echo '<script>alert("Foto gagal diupload");</script>';
            }
           }          
        }else{
            echo '<script>alert("ukuran Gambar terlalu besar tidak lebih dari 2 MB");</script>';
           }
    }else{
        echo '<script>alert("Gambar yang diupload harus format jpg/jpeg/png");</script>';
    }
}

?>