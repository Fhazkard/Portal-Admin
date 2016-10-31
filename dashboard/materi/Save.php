<?php
require "../../koneksi/konek.php";
function UploadFile($subFolder, $file_name){
    if (move_uploaded_file($_FILES['file']['tmp_name'], $subFolder)) {
            echo'Berhasil Di simpan file dengan nama'."$file_name";
        }
        else{
            echo 'Gagal Disimpan file dengan nama'."$file_name";
        }
}
if (isset($_POST["Save"])) {
    $file_name	= $_FILES["data_upload"]["name"];
    $file_size	= $_FILES["data_upload"]["size"];
    $KelasBimbel = $_REQUEST["KelasBimble"];
    $Kelas = $_REQUEST["Kelas"];
    $Judul = $_REQUEST["Judul"];
    $Keterangan = $_REQUEST["Keterangan"];
    $KelasBimbel_Name = $_REQUEST["KelasBimble_Name"];
    $Kelas_Name = $_REQUEST["Kelas_Name"];
    $directory = "../../Upload/$KelasBimbel_Name";
    
    if (is_dir($directory)==TRUE) {
        $SubFolder = $directory.'/'.$Kelas_Name.'/';
        
        if (is_dir($SubFolder)==TRUE) {
            chmod($SubFolder, 755);   // decimal; probably incorrect
            chmod($SubFolder, 0755);  // octal; correct value of mode
            if (move_uploaded_file($_FILES["data_upload"]["tmp_name"], $SubFolder)) {
                echo'Berhasil Di simpan file dengan nama'."$file_name";
            }
            else{
                echo 'Gagal Disimpan file dengan nama '."$file_name";
            }
        } else {
            mkdir($SubFolder);
            chmod($SubFolder, 755);   // decimal; probably incorrect
            chmod($SubFolder, 0755);  // octal; correct value of mode
            if (move_uploaded_file($_FILES["data_upload"]["tmp_name"], $SubFolder)) {
                echo'Berhasil Di simpan file dengan nama'."$file_name";
            }
            else{
                echo 'Gagal Disimpan file dengan nama '."$file_name";
            }
        }
    }
    else{
        mkdir($directory);
        $SubFolder = $directory.'/'.$Kelas_Name.'/';
        mkdir($SubFolder);
        chmod($SubFolder, 755);   // decimal; probably incorrect
        chmod($SubFolder, 0755);  // octal; correct value of mode
        if (move_uploaded_file($_FILES["data_upload"]["tmp_name"], $SubFolder)) {
            echo'Berhasil Di simpan file dengan nama'."$file_name";
        }
        else{
            echo 'Gagal Disimpan file dengan nama '."$file_name";
        }
    }
}
/*$sql = "INSERT INTO materi(bimbel_id, kelas_id, judul, keterangan, date, file_location) VALUES ('$KelasBimbel','$Kelas','$Judul','$Keterangan','$tanggal','$File')";
$tambahdata = mysqli_query($sql, $koneksi) or die('Could not look up user information; ' . mysqli_error($koneksi));;
if(! $tambahdata )
{
  die('Gagal Tambah Data');
}
echo "Berhasil tambah data\n";
mysql_close($koneksi);
echo $tanggal." ".$Judul." ".$Keterangan." ".$Kelas;
*/
/*
$target_file = $directory . basename($_FILES["file"]["name"]);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
