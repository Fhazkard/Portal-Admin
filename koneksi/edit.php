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
	}else if($module == 'murid'){
		if(isset($_REQUEST['nama']) && isset($_REQUEST['tgl_lahir']) && isset($_REQUEST['ortu']) && isset($_REQUEST['alamat']) && isset($_REQUEST['tlp'])&& isset($_REQUEST['murid_id'])){
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
			$murid_id = $_REQUEST['murid_id'];
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
			$murid_id = mysqli_real_escape_string($koneksi, $murid_id);
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$bimbel_id = mysqli_real_escape_string($koneksi, $bimbel_id);
			$kelas_id = mysqli_real_escape_string($koneksi, $kelas_id);
			$sekolah_id = mysqli_real_escape_string($koneksi, $sekolah_id);
			$tgl_lahir = mysqli_real_escape_string($koneksi, $tgl_lahir);
			$jk = mysqli_real_escape_string($koneksi, $jk);
			$ortu = mysqli_real_escape_string($koneksi, $ortu);
			$alamat = mysqli_real_escape_string($koneksi, $alamat);
			$tlp = mysqli_real_escape_string($koneksi, $tlp);			
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET sekolah_id='".$sekolah_id."', kelas_id='".$kelas_id."', bimbel_id='".$bimbel_id."', nama='".$nama."', 
													tgl_lahir='".$tgl_lahir."' , jk='".$jk."' , alamat='".$alamat."' , nama_ortu='".$ortu."' , tlp='".$tlp."' WHERE ".$module."_id='".$murid_id."'");	
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
	}else if($module == 'materi'){
		if(isset($_REQUEST['keterangan']) && isset($_FILES['data_upload']) && isset($_REQUEST['materi_id']) && isset($_REQUEST['file_location'])){
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
			$DirectoryFull= getcwd();
			$DirectoryFull= $DirectoryFull.'/uploads';
			$file_name	= $_FILES["data_upload"]["name"];
			$OldFile = $_REQUEST["file_location"];			
			$materi_id = $_REQUEST['materi_id'];
			$judul = $_REQUEST['judul'];
			$kelas_id = $_REQUEST["kelas_id"];
			$sekolah_id = $_REQUEST["sekolah_id"];
			$keterangan = $_REQUEST["keterangan"];
			$DirectoryFull =  $DirectoryFull.'/'.$judul;			
			if(!empty($judul) || !empty($keterangan) || !empty($data_upload)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/".$module."/'</script>");
			}
			if(!file_exists($DirectoryFull)){
				mkdir($DirectoryFull,0777,true);
				$DirectoryFull = $DirectoryFull.'/'.$file_name;
				if(!file_exists($DirectoryFull)){
					unlink($OldFile);
					move_uploaded_file($_FILES["data_upload"]["tmp_name"],$DirectoryFull);
				}else{
					die("<script>alert('Edit File Materi Gagal! Ada Nama File Yang Sama!')
					window.location = '../dashboard/".$module."/'</script>");
				}
			}else{
				$DirectoryFull = $DirectoryFull.'/'.$file_name;
				if(!file_exists($DirectoryFull)){
					unlink($OldFile);
					move_uploaded_file($_FILES["data_upload"]["tmp_name"],$DirectoryFull);
				}else{
					die("<script>alert('Edit File Materi Gagal! Ada Nama File Yang Sama!')
					window.location = '../dashboard/".$module."/'</script>");
				}
			}
			$materi_id = mysqli_real_escape_string($koneksi, $materi_id);			
			$kelas_id = mysqli_real_escape_string($koneksi, $kelas_id);
			$sekolah_id = mysqli_real_escape_string($koneksi, $sekolah_id);	
			$keterangan = mysqli_real_escape_string($koneksi, $keterangan);			
			$DirectoryFull = mysqli_real_escape_string($koneksi, $DirectoryFull);	
			
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET sekolah_id='".$sekolah_id."', kelas_id='".$kelas_id."', keterangan='".$keterangan."' , file_location='".$DirectoryFull."' WHERE ".$module."_id='".$materi_id."'");	
			if($update_data){
				echo "<script>alert('Data Telah di Simpan dan File Sudah Terganti!') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}else{
				echo "<script>alert('Data Gagal di Simpan') 
				window.location = '../dashboard/".$module."/'</script>"; 
			}
		}else{
			die("<script>alert('Error Load Page!') 
			window.location = '../'</script>");
		}
	}else if($module == 'admin'){
		if(isset($_REQUEST['password']) && isset($_REQUEST['konfirm']) && isset($_REQUEST['nama'])){
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
			$nama =  $_REQUEST['nama'];
			$password = $_REQUEST['password'];
			$konfirm = $_REQUEST['konfirm'];
			if(!empty($password) || !empty($konfirm)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/'</script>");
			}
			if($password == $konfirm){	
			}else{
				die("<script>alert('Password Dengan Password Konfirmasi Tidak Sama!')
				window.location = '../dashboard/'</script>");
			}			
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$password = mysqli_real_escape_string($koneksi, $password);
			$password = md5($password);
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET pass='".$password."' WHERE user_name='".$nama."'");	
			if($update_data){
				echo "<script>alert('Password Telah Berhasil di Ganti!') 
				window.location = '../'</script>";
				session_destroy();
			}else{
				echo "<script>alert('Password Gagal di Ganti!') 
				window.location = '../dashboard/'</script>"; 
			}
		}else{
		die("<script>alert('Error Load Page!') 
		window.location = '../'</script>");
		}
	}else if($module == 'login'){
		if(isset($_REQUEST['password']) && isset($_REQUEST['konfirm']) && isset($_REQUEST['nama'])){
			if(!CSRF::validatePost()) {
				die("<script>alert('Restricted URL!') 
				window.location = '../'</script>");
				session_destroy();
			}
			$limit = $_SESSION['waktu'];
			if(time() < $limit){		
				}else{
				die("<script>alert('Silahkan Login Ulang!') 
				window.location = '../'</script>");
				unset($_SESSION['waktu']);
				session_destroy();
			}
			$nama =  $_REQUEST['nama'];
			$password = $_REQUEST['password'];
			$konfirm = $_REQUEST['konfirm'];
			if(!empty($password) || !empty($konfirm)){	
			}else{
				die("<script>alert('Anda Harus Mengisi Semua Form!')
				window.location = '../dashboard/login'</script>");
			}
			if($password == $konfirm){	
			}else{
				die("<script>alert('Password Dengan Password Konfirmasi Tidak Sama!')
				window.location = '../dashboard/login'</script>");
			}			
			$nama = mysqli_real_escape_string($koneksi, $nama);
			$password = mysqli_real_escape_string($koneksi, $password);
			$password = md5($password);
			$update_data = mysqli_query($koneksi, "UPDATE ".$module." SET pass='".$password."' WHERE user_name='".$nama."'");	
			if($update_data){
				echo "<script>alert('Password Telah Berhasil di Ganti!') 
				window.location = '../'</script>";
				session_destroy();
			}else{
				echo "<script>alert('Password Gagal di Ganti!') 
				window.location = '../dashboard/login'</script>"; 
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