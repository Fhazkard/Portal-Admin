<?php
require "../../ConnectionString.php";
$tanggal = date('Y-m-d H:i:s');
$Judul = $_REQUEST["Judul"];
$Keterangan = $_REQUEST["Keterangan"];
$Kelas = $_REQUEST["Kelas"];
$KelasBimbel = $_REQUEST["KelasBimble"];
$Kode_Admin = "";
$File = "/adin/test";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "INSERT INTO materi(bimbel_id, kelas_id, judul, keterangan, date, file_location) VALUES ('$KelasBimbel','$Kelas','$Judul','$Keterangan','$tanggal','$File')";
$tambahdata = mysqli_query($sql, $conn) or die('Could not look up user information; ' . mysqli_error($conn));;
if(! $tambahdata )
{
  die('Gagal Tambah Data');
}
echo "Berhasil tambah data\n";
mysql_close($conn);
echo $tanggal." ".$Judul." ".$Keterangan." ".$Kelas;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
