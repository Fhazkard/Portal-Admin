<?php
error_reporting(0);
require 'konek.php';
require 'csrf.php';
require 'script.php';
session_start();
CSRF::init();
If(isset($_REQUEST['module'])){
	$module = $_REQUEST['module'];
	if($module == 'sekolah'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['jenis']) && isset($_REQUEST['alamat']) && isset($_REQUEST['tlp']) && isset($_REQUEST['sekolah_id'])){
			if(!CSRF::validatePost()) {
				die("<script>alert('Restricted URL!') 
				window.location = '../'</script>");
				session_destroy();
			}
			$limit = $_SESSION['limit'];
			if(time() < $limit){		
				}else{
				die("<script>alert('Silahkan Login Ulang!') 
				window.location = '../'</script>");
				unset($_SESSION['limit']);
				session_destroy();
			}
			$sekolah_id = $_REQUEST['sekolah_id'];
			$nama = $_REQUEST['nama'];
			$jenis = $_REQUEST['jenis'];
			$alamat = $_REQUEST['alamat'];
			$tlp = $_REQUEST['tlp'];
			if(!empty($nama) || !empty($alamat)||!empty($tlp)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/sekolah/'</script>");
			}
			$sekolah_id = mysqli_real_escape_string($koneksi, $sekolah_id);
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$jenis = mysqli_real_escape_string($koneksi, $jenis);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);
			$update_data = mysqli_query($koneksi, "UPDATE sekolah SET nama='".$nama."', jenis='".$jenis."', alamat='".$alamat."', tlp='".$tlp."' WHERE sekolah_id='".$sekolah_id."'");	
			if($update_data){
				echo "<script>alert('Data Telah di Simpan!') 
				window.location = '../dashboard/sekolah'</script>"; 
			}else{
				echo "<script>alert('Data Gagal di Simpan!') 
				window.location = '../dashboard/sekolah/'</script>"; 
			}
		}else{
		die("<script>alert('Error Load Page!') 
		window.location = '../'</script>");
		}
	}else if($module == 'kelas'){
			if(isset($_REQUEST['nama']) && isset($_REQUEST['kelas_id'])){
			if(!CSRF::validatePost()) {
				die("<script>alert('Restricted URL!') 
				window.location = '../'</script>");
				session_destroy();
			}
			$limit = $_SESSION['limit'];
			if(time() < $limit){		
				}else{
				die("<script>alert('Silahkan Login Ulang!') 
				window.location = '../'</script>");
				unset($_SESSION['limit']);
				session_destroy();
			}
			$kelas_id =  $_REQUEST['kelas_id'];
			$nama = $_REQUEST['nama'];
			if(!empty($nama)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/kelas/'</script>");
			}
			$kelas_id = mysqli_real_escape_string($koneksi, $kelas_id);
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$update_data = mysqli_query($koneksi, "UPDATE kelas SET nama='".$nama."' WHERE kelas_id='".$kelas_id."'");	
			if($update_data){
				echo "<script>alert('Data Telah di Simpan!') 
				window.location = '../dashboard/kelas'</script>"; 
			}else{
				echo "<script>alert('Data Gagal di Simpan!') 
				window.location = '../dashboard/kelas/'</script>"; 
			}
		}else{
		die("<script>alert('Error Load Page!') 
		window.location = '../'</script>");
		}
	}
}

?>