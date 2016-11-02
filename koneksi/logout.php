<?php
error_reporting(0);
include 'konek.php';
require 'csrf.php';
session_start();
CSRF::init();

if(isset($_REQUEST['logout'])){	
	if(!CSRF::validatePost()) {
		die("<script>alert('Your Key is Expired!') 
		window.location ='../'</script>");
		session_destroy();
	}	
	echo "<script>alert('Logout Berhasil!')
	window.location = '../'</script>";
	unset($_SESSION['limit']);
	session_destroy();	
}else{
	die("<script>alert('Error Load Page!') 
	window.location = '../'</script>");
	session_destroy();
}
?>