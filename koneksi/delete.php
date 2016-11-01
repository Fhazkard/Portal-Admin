<?php
require 'konek.php';
require 'csrf.php';
require 'script.php';
session_start();
CSRF::init();
	if(isset($_REQUEST['delete_id']) && isset($_REQUEST['module'])){
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
		$module = $_REQUEST['module'];
		$id = $_REQUEST['delete_id'];
		$delete_data = mysqli_query($koneksi, "DELETE FROM ".$module." WHERE ".$module."_id='".$id."'");
		if($delete_data){	
			echo "<script>alert('Data Berhasil di hapus!') 
			window.location = '../dashboard/".$module."'</script>"; 
		}else{
			echo "<script>alert('Data Gagal di hapus!') 
			window.location = '../dashboard/".$module."'</script>"; 
		}
	}else{
		die("<script>alert('Error Load Page!') 
		window.location = '../'</script>");
	}

?>