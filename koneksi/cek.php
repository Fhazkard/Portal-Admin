<?php
error_reporting(0);
require 'konek.php';
require 'csrf.php';
require 'script.php';
session_start();
CSRF::init();
if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
	if(!CSRF::validatePost()) {
		die("<script>alert('Restricted URL!') 
		window.location = '../'</script>");
		session_destroy();
	}
	$nama = $_REQUEST['username'];	
	$pass = $_REQUEST['password'];
	$nama = cek_string($nama);
	$pass = cek_string($pass);
	if(!empty($nama) || !empty($pass)){	
	}else{
		die("<script>alert('Anda Harus Mengisi Username dan Password!') 
		window.location = '../'</script>");
	}
	$nama = mysqli_real_escape_string($koneksi, $nama);
	$pass = mysqli_real_escape_string($koneksi, $pass);
    $pass = md5($pass);
	$batas = 0;
	if($nama == 'administrator'){
		$selek_data = mysqli_query($koneksi, "SELECT * FROM admin WHERE user_name='".$nama."' AND pass='".$pass."'");		
		while($data = mysqli_fetch_array($selek_data)){
			$batas ++;
		}	
			if($batas == 1){		
				$_SESSION['limit'] = time() + 1800;
				$_SESSION['admin'] = $nama;
				echo "<script>alert('Anda Berhasil Login!')
				window.location = '../dashboard/'</script>";
			}else{
				echo "<script>alert('Anda Gagal Login!')
				window.location = '../'</script>";
			}
	}else{
		$selek_data = mysqli_query($koneksi, "SELECT * FROM login WHERE user_name='".$nama."' AND pass='".$pass."'");
		while($data = mysqli_fetch_array($selek_data)){
			$batas ++;
			$id = $data['murid_id'];
		}	
			if($batas == 1){		
				$_SESSION['waktu'] = time() + 1800;
				$_SESSION['login'] = $nama;
				$_SESSION['murid_id'] = $id;
				echo "<script>alert('Anda Berhasil Login!')
				window.location = '../dashboard/login'</script>";
			}else{
				echo "<script>alert('Anda Gagal Login!')
				window.location = '../'</script>";
			}	
	} 
}else{
	die("<script>alert('Error Load Page!') 
	window.location = '../'</script>");
}
?>