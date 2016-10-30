<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'database_bwb';
$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi)
{
	echo "Koneksi Ke Database Gagal! ".mysqli_error;
}
//$pass = 'bwbadmin2016';
//$pass = crypt($pass);
//$update_data = mysqli_query($koneksi, "UPDATE admin SET password='".$pass."' WHERE admin_id=1");
//if($update_data){
//		echo "<script>alert('Data Telah di Simpan!') 
//		window.location = 'admin.php'</script>"; 
//	}else{
//		echo "<script>alert('Data Gagal di Simpan!') 
//		window.location = 'admin.php'</script>"; 
//	}
?>
