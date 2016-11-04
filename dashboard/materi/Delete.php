<?php
require "../../koneksi/konek.php";
if (isset($_POST["Hapus"])) {
    $Materi_id = $_REQUEST["materi_id"];
    $OldFile = $_REQUEST["file_location"];
    $sql = "DELETE FROM materi WHERE materi_id = '$Materi_id'";
    if ($koneksi->query($sql)===TRUE) {
        unlink($OldFile);
        echo 'Data berhasil di hapus';
    }
    else{
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    $koneksi->close();
};
?>

