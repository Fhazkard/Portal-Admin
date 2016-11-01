<?php
//error_reporting(0);
require 'konek.php';
require 'csrf.php';
session_start();
CSRF::init();
if(isset($_REQUEST['module'])){
	$module = $_REQUEST['module'];
	if($module == 'sekolah'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['jenis']) && isset($_REQUEST['alamat']) &&isset($_REQUEST['tlp'])){
			if(!CSRF::validatePost()) {
				die("<script>alert('Restricted URL !') 
				window.location = '../'</script>");
				session_destroy();
			}
			$limit = $_SESSION['limit'];
			if (time() < $limit){		
				}else{
				die("<script>alert('Silahkan Login Ulang!') 
				window.location = '../'</script>");
				unset($_SESSION['limit']);
				session_destroy();
			}
			$nama = $_REQUEST['nama'];
			$jenis = $_REQUEST['jenis'];
			$alamat = $_REQUEST['alamat'];
			$tlp = $_REQUEST['tlp'];
			if(!empty($nama) || !empty($alamat)||!empty($tlp)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/sekolah/'</script>");
			}
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$jenis = mysqli_real_escape_string($koneksi, $jenis);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);			
			$insert_data = mysqli_query($koneksi, "INSERT INTO  sekolah (nama,jenis,alamat,tlp) VALUES ('".$nama."', '".$jenis."', '".$alamat."', '".$tlp."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah!')
				window.location = '../dashboard/sekolah/'</script>";	
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
				window.location = '../dashboard/sekolah/'</script>";
			}
		}else{
			die("<script>alert('Error Load Page!') 
			window.location = '../'</script>");
		}			
	}else if($module == 'kelas'){
			if(isset($_REQUEST['nama'])){
			if(!CSRF::validatePost()) {
				die("<script>alert('Restricted URL !') 
				window.location = '../'</script>");
				session_destroy();
			}
			$limit = $_SESSION['limit'];
			if (time() < $limit){		
				}else{
				die("<script>alert('Silahkan Login Ulang!') 
				window.location = '../'</script>");
				unset($_SESSION['limit']);
				session_destroy();
			}
			$nama = $_REQUEST['nama'];
			if(!empty($nama)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/kelas/'</script>");
			}
			$nama = mysqli_real_escape_string($koneksi, $nama);			
			$insert_data = mysqli_query($koneksi, "INSERT INTO kelas (nama) VALUES ('".$nama."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah!')
				window.location = '../dashboard/kelas/'</script>";	
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
				window.location = '../dashboard/kelas/'</script>";
			}
		}else{
			die("<script>alert('Error Load Page!') 
			window.location = '../'</script>");
		}	
	}
}

?>
