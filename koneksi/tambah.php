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
				$select_data = mysqli_query($koneksi, "SELECT * FROM murid ORDER BY murid_id DESC LIMIT 1");				
				while($data = mysqli_fetch_array($select_data)){
					$murid_id = $data['murid_id'];
				}
				$nama = explode(' ',$nama);
				$murid_id = $murid_id;
				$user_name = $murid_id.''.$sekolah_id.''.$kelas_id.''.$bimbel_id.'_'.$nama[0];
				$pass = md5('123456');
				$buat_account = mysqli_query($koneksi, "INSERT INTO login (murid_id,user_name,pass) VALUES ('".$murid_id."','".$user_name."','".$pass."')");
				if(!$buat_account){
					echo "<script>alert('Account User Gagal di Buat!')
					window.location = '../dashboard/".$module."/'</script>";
				}
				echo "<script>alert('Data Murid Berhasil Di Tambah!\\nDengan Login \\nUSERNAME: ".$user_name."\\nPASSWORD: 123456')
				window.location = '../dashboard/".$module."/'</script>";			
			}else{
				echo "<script>alert('Data Gagal Di Tambah!')
				window.location = '../dashboard/".$module."/'</script>";
			}
		}else{
			die("<script>alert('Error Load Page!') 
			window.location = '../'</script>");
		}
	}else if($module == 'materi'){
		if(isset($_REQUEST['judul']) && isset($_REQUEST['keterangan']) && isset($_FILES['data_upload'])){
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
			$judul = $_REQUEST["judul"];
			$bimbel_id = $_REQUEST["bimbel_id"];
			$kelas_id = $_REQUEST["kelas_id"];
			$sekolah_id = $_REQUEST["sekolah_id"];
			$keterangan = $_REQUEST["keterangan"];
			$tgl_terbit = date('Y-m-d');
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
					move_uploaded_file($_FILES["data_upload"]["tmp_name"],$DirectoryFull);
				}else{
					die("<script>alert('Upload Data Materi Gagal! Ada Nama File Yang Sama!')
					window.location = '../dashboard/".$module."/'</script>");
				}
			}else{
				$DirectoryFull = $DirectoryFull.'/'.$file_name;
				if(!file_exists($DirectoryFull)){
					move_uploaded_file($_FILES["data_upload"]["tmp_name"],$DirectoryFull);
				}else{
					die("<script>alert('Upload Data Materi Gagal! Ada Nama File Yang Sama!')
					window.location = '../dashboard/".$module."/'</script>");
				}
			}			
			$judul = mysqli_real_escape_string($koneksi, $judul);
			$bimbel_id = mysqli_real_escape_string($koneksi, $bimbel_id);
			$kelas_id = mysqli_real_escape_string($koneksi, $kelas_id);
			$sekolah_id = mysqli_real_escape_string($koneksi, $sekolah_id);	
			$keterangan = mysqli_real_escape_string($koneksi, $keterangan);			
			$tgl_terbit = mysqli_real_escape_string($koneksi, $tgl_terbit);
			$DirectoryFull = mysqli_real_escape_string($koneksi, $DirectoryFull);		
			$insert_data = mysqli_query($koneksi, "INSERT INTO  ".$module." (sekolah_id,kelas_id,bimbel_id,judul,keterangan,tgl_terbit,file_location) VALUES ('".$sekolah_id."','".$kelas_id."','".$bimbel_id."','".$judul."','".$keterangan."','".$tgl_terbit."','".$DirectoryFull."')");
			if($insert_data){
				echo "<script>alert('Data Berhasil Di Tambah dan Di Upload!')
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
