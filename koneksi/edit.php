<?php
//error_reporting(0);
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
				window.location = '../dashboard/".$module."/'</script>");
			}
			$sekolah_id = mysqli_real_escape_string($koneksi, $sekolah_id);
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$jenis = mysqli_real_escape_string($koneksi, $jenis);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET nama='".$nama."', jenis='".$jenis."', alamat='".$alamat."', tlp='".$tlp."' WHERE ".$module."_id='".$sekolah_id."'");	
			if($update_data){
				echo "<script>alert('Data Telah di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}else{
				echo "<script>alert('Data Gagal di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
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
				window.location = '../dashboard/".$module."/'</script>");
			}
			$kelas_id = mysqli_real_escape_string($koneksi, $kelas_id);
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET nama='".$nama."' WHERE ".$module."_id='".$kelas_id."'");	
			if($update_data){
				echo "<script>alert('Data Telah di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}else{
				echo "<script>alert('Data Gagal di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}
		}else{
		die("<script>alert('Error Load Page!') 
		window.location = '../'</script>");
		}
	}else if($module == 'pengajar'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['umur']) && isset($_REQUEST['jk']) && isset($_REQUEST['alamat']) && isset($_REQUEST['tlp']) && isset($_REQUEST['pengajar_id'])){
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
			$pengajar_id = $_REQUEST['pengajar_id'];
			$nama = $_REQUEST['nama'];
			$umur = $_REQUEST['umur'];
			$jk = $_REQUEST['jk'];
			$alamat = $_REQUEST['alamat'];
			$tlp = $_REQUEST['tlp'];
			if(!empty($nama) || !empty($umur) || !empty($alamat)||!empty($tlp)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/".$module."/'</script>");
			}
			$pengajar_id = mysqli_real_escape_string($koneksi, $pengajar_id);
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$umur = mysqli_real_escape_string($koneksi, $umur);
			$jk = mysqli_real_escape_string($koneksi, $jk);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET nama='".$nama."', umur='".$umur."', jk='".$jk."', alamat='".$alamat."', tlp='".$tlp."' WHERE ".$module."_id='".$pengajar_id."'");	
			if($update_data){
				echo "<script>alert('Data Telah di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}else{
				echo "<script>alert('Data Gagal di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}
		}else{
		die("<script>alert('Error Load Page!') 
		window.location = '../'</script>");
		}
	}else if($module == 'bimbel'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['pengajar']) && isset($_REQUEST['bimbel_id'])){
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
			$bimbel_id =  $_REQUEST['bimbel_id'];
			$nama = $_REQUEST['nama'];
			$pengajar = $_REQUEST['pengajar'];
			if(!empty($nama)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/".$module."/'</script>");
			}
			$bimbel_id = mysqli_real_escape_string($koneksi, $bimbel_id);
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$pengajar = mysqli_real_escape_string($koneksi, $pengajar);
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET nama='".$nama."', pengajar_id='".$pengajar."' WHERE ".$module."_id='".$bimbel_id."'");	
			if($update_data){
				echo "<script>alert('Data Telah di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}else{
				echo "<script>alert('Data Gagal di Simpan!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}
		}else{
		die("<script>alert('Error Load Page!') 
		window.location = '../'</script>");
		}
	}else{
		echo "<script>alert('Module Tidak Ada Yang Tepat!')
			window.location = '../dashboard/".$module."/'</script>";
	}
}

?>