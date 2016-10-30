<?php
	function cek_string($kata){
		$kata = str_replace(" ", "",$kata);
		$kata = str_replace("'", "",$kata);
		$kata = str_replace('"', '',$kata);
		$kata = str_replace("<", "",$kata);
		$kata = str_replace(">", "",$kata);
		$kata = str_replace("-", "",$kata);
		$kata = str_replace("=", "",$kata);
		$kata = str_replace("#", "",$kata);
		$kata = str_replace("$", "",$kata);
		$kata = str_replace("/", "",$kata);
		$kata = str_replace("*", "",$kata);
		$kata = str_replace("?", "",$kata);
		$kata = str_replace(".", "",$kata);
		$kata = str_replace("@", "",$kata);
		//bisa di uncomment jika tidak ada penggunaan kata or/and di fitur semua input
/* 		$kata = str_replace("or", "",$kata);
		$kata = str_replace("OR", "",$kata);
		$kata = str_replace("and", "",$kata);
		$kata = str_replace("AND", "",$kata); */
		$kata = strip_tags($kata);
		$kata = htmlspecialchars($kata);
		$kata = htmlentities($kata);				
		return $kata;	
	}
?>