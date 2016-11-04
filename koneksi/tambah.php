<?php
error_reporting(0);
require 'konek.php';
require 'csrf.php';
session_start();
CSRF::init();
if(isset($_REQUEST['module'])){
	$module = $_REQUEST['module'];
	if($module == 'sekolah'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['jenis']) && isset($_REQUEST['alamat']) && isset($_REQUEST['tlp'])){
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
				window.location = '../dashboard/".$module."/'</script>");
			}
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$jenis = mysqli_real_escape_string($koneksi, $jenis);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);			
			$insert_data = mysqli_query($koneksi, "INSERT INTO  ".$module." (nama,jenis,alamat,tlp) VALUES ('".$nama."', '".$jenis."', '".$alamat."', '".$tlp."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";	
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";
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
				window.location = '../dashboard/".$module."/'</script>");
			}
			$nama = mysqli_real_escape_string($koneksi, $nama);			
			$insert_data = mysqli_query($koneksi, "INSERT INTO ".$module." (nama) VALUES ('".$nama."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";	
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";
			}
		}else{
			die("<script>alert('Error Load Page!') 
			window.location = '../'</script>");
		}	
	}else if($module == 'pengajar'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['umur'])&& isset($_REQUEST['jk']) && isset($_REQUEST['alamat']) &&isset($_REQUEST['tlp'])){
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
			$umur = $_REQUEST['umur'];
			$jk = $_REQUEST['jk'];
			$alamat = $_REQUEST['alamat'];
			$tlp = $_REQUEST['tlp'];
			if(!empty($nama) || !empty($umur) || !empty($alamat)||!empty($tlp)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/".$module."/'</script>");
			}
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$umur = mysqli_real_escape_string($koneksi, $umur);
			$jk = mysqli_real_escape_string($koneksi, $jk);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);			
			$insert_data = mysqli_query($koneksi, "INSERT INTO  ".$module." (nama,umur,jk,alamat,tlp) VALUES ('".$nama."', '".$umur."', '".$jk."', '".$alamat."', '".$tlp."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";	
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";
			}
		}else{
			die("<script>alert('Error Load Page!') 
			window.location = '../'</script>");
		}	
	}else if($module == 'bimbel'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['pengajar'])){
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
			$pengajar_id = $_REQUEST['pengajar'];
			if(!empty($nama)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/".$module."/'</script>");
			}
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$pengajar_id = mysqli_real_escape_string($koneksi, $pengajar_id);			
			$insert_data = mysqli_query($koneksi, "INSERT INTO ".$module." (nama,pengajar_id) VALUES ('".$nama."','".$pengajar_id."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";	
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";
			}
		}else{
			die("<script>alert('Error Load Page!') 
			window.location = '../'</script>");
		}	
	}else if($module == 'murid'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['tgl_lahir']) && isset($_REQUEST['ortu']) && isset($_REQUEST['alamat']) && isset($_REQUEST['tlp'])){
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
			$bimbel_id = $_REQUEST['bimbel_id'];
			$kelas_id = $_REQUEST['kelas_id'];
			$sekolah_id = $_REQUEST['sekolah_id'];
			$tgl_lahir = $_REQUEST['tgl_lahir'];
			$jk = $_REQUEST['jk'];
			$ortu = $_REQUEST['ortu'];
			$alamat = $_REQUEST['alamat'];
			$tlp = $_REQUEST['tlp'];
			if(!empty($nama) || !empty($tgl_lahir) || !empty($ortu) || !empty($alamat)||!empty($tlp)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/".$module."/'</script>");
			}
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$bimbel_id = mysqli_real_escape_string($koneksi, $bimbel_id);
			$kelas_id = mysqli_real_escape_string($koneksi, $kelas_id);
			$sekolah_id = mysqli_real_escape_string($koneksi, $sekolah_id);	
			$tgl_lahir = mysqli_real_escape_string($koneksi, $tgl_lahir);			
			$jk = mysqli_real_escape_string($koneksi, $jk);
			$ortu = mysqli_real_escape_string($koneksi, $ortu);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);			
			$insert_data = mysqli_query($koneksi, "INSERT INTO  ".$module." (sekolah_id,kelas_id,bimbel_id,nama,tgl_lahir,jk,alamat,nama_ortu,tlp) VALUES ('".$sekolah_id."','".$kelas_id."','".$bimbel_id."','".$nama."','".$tgl_lahir."','".$jk."','".$alamat."', '".$ortu."','".$tlp."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";	
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
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
