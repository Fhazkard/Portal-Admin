<?php
error_reporting(0);
require 'konek.php';
require 'csrf.php';
require 'script.php';
session_start();
CSRF::init();
if(isset($_REQUEST['link_download'])){
	if(!CSRF::validatePost()) {
		die("<script>alert('Your Key is Expired!') 
		window.location ='../'</script>");
		unset($_SESSION['waktu']);
		session_destroy();
	}
	$link_download = $_REQUEST['link_download'];
	$link_download = substr($link_download,37);
	die ("<script> window.location ='".$link_download."'; window.setTimeout(function(){window.location.href = '../dashboard/login'}, 2000);</script>");
}else{
	die("<script>alert('Error Load Page!') 
	window.location = '../'</script>");
}
?>