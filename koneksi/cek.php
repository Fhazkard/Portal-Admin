<?php
error_reporting(0);
require 'konek.php';
require 'csrf.php';
require 'script.php';
session_start();
CSRF::init();
if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
	if(!CSRF::validatePost()) {
		die("<script>alert('Restricted URL!') 
		window.location = 'index.php'</script>");
		session_destroy();
	}
	$nama = $_REQUEST['username'];	
	$pass = $_REQUEST['password'];
	$nama = cek_string($nama);
	$pass = cek_string($pass);
	$nama = mysqli_real_escape_string($koneksi, $nama);
	$pass = mysqli_real_escape_string($koneksi, $pass);
        $pass = crypt($pass);
}else{
	die("<script>alert('Error Load Page!') 
	window.location = 'index.php'</script>");
}
if(!empty($nama) || !empty($pass)){	
}else{
	die("<script>alert('Anda Harus Mengisi Username dan Password!') 
	window.location = 'index.php'</script>");
}
$selek_data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='".$nama."' AND password='".$pass."'");
	if($selek_data){		
		$_SESSION['limit'] = time() + 300;
		echo "<script>alert('Anda Berhasil Login!')
		window.location = '../dashboard/'</script>";
		}else{
		echo "<script>alert('Anda Gagal Login!')
		window.location = '../'</script>";
                }

?>