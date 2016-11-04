<?php
require "../../koneksi/konek.php";
if (isset($_POST["Edit"])) {
    $Materi_id = $_REQUEST["materi_id"];
    $OldFile = $_REQUEST["file_location"];
    $KelasBimbel = $_REQUEST["bimbel_id"];
    $Sekolah = $_REQUEST["sekolah_id"];
    $Kelas = $_REQUEST["kelas_id"];
    $Judul = $_REQUEST["judul"];
    $Keterangan = $_REQUEST["keterangan"];
    $KelasBimbel_Name = $_REQUEST["bimbel_name"];
    $Sekolah_Name = $_REQUEST["sekolah_name"];
    $Kelas_Name = $_REQUEST["kelas_name"];
    
    
    $file_name	= $_FILES["data_upload"]["name"];
    $file_size	= $_FILES["data_upload"]["size"];
    $directory = "../../Upload/$KelasBimbel_Name/$Sekolah_Name/$Kelas_Name";

    $Bool_File_Name = stripos($OldFile, $file_name);
    
    if (file_exists($OldFile)==TRUE && $file_name == "") {
        $sql ="UPDATE materi SET judul='$Judul',keterangan='$Keterangan' WHERE materi_id = '$Materi_id'";
        if ($koneksi->query($sql)===TRUE) {
            echo 'Data Tersimpan';
        }
        else{
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
        $koneksi->close();
    }else{
        if (move_uploaded_file($_FILES["data_upload"]["tmp_name"], $directory.'/'.$file_name)) {
            unlink($OldFile);
            $directoryNew = $directory.'/'.$file_name;
            $sql ="UPDATE materi SET judul='$Judul',keterangan='$Keterangan', file_location='$directoryNew' WHERE materi_id = '$Materi_id'";
            if ($koneksi->query($sql)===TRUE) {
                echo 'Data Tersimpan';
            }
            else{
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
            $koneksi->close();
        }
        else{
            echo 'Gagal Disimpan file dengan nama '."$file_name";
        }
    }
};
?>

