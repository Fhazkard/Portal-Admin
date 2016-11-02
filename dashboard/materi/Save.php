<?php
require "../../koneksi/konek.php";
if (isset($_POST["Save"])) {
    $file_name	= $_FILES["data_upload"]["name"];
    $file_size	= $_FILES["data_upload"]["size"];
    $KelasBimbel = $_REQUEST["bimbel_id"];
    $Kelas = $_REQUEST["kelas_id"];
    $Judul = $_REQUEST["judul"];
    $Keterangan = $_REQUEST["keterangan"];
    $KelasBimbel_Name = $_REQUEST["KelasBimble_Name"];
    $Kelas_Name = $_REQUEST["Kelas_Name"];
    $directory = "../../Upload/$KelasBimbel_Name";
    $DirectoryFull="";
    $SubFolder="";
    $Date = date('Y-m-d H:i:s');
    if (is_dir($directory)==TRUE) {
        $SubFolder = $directory.'/'.$Kelas_Name;
        if (is_dir($SubFolder)==TRUE) {
            $DirectoryFull = $SubFolder.'/'.$file_name;
        } else {
            mkdir($SubFolder);
            $DirectoryFull = $SubFolder.'/'.$file_name;
        }
    }
    else{
        mkdir($directory);
        $SubFolder = $directory.'/'.$Kelas_Name;
        mkdir($SubFolder);
        $DirectoryFull = $SubFolder.'/'.$file_name;
    }
    $Sql = "INSERT INTO materi(bimbel_id, kelas_id, judul, keterangan, date, file_location)".
           "VALUES ('$KelasBimbel','$Kelas','$Judul','$Keterangan','$Date','$DirectoryFull')";
    
    if ($koneksi->query($Sql)===TRUE) {
        if (move_uploaded_file($_FILES["data_upload"]["tmp_name"], $SubFolder.'/'.$file_name)) {
            echo 'Data Tersimpan';
        }
        else{
            echo 'Gagal Disimpan file dengan nama '."$file_name";
        }
    }
    else{
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    $koneksi->close();
    
}
?>
