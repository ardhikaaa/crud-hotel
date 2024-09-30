<?php
//include koneksi database
include '../koneksi.php';

//get data dari form
$id             = $_POST['id'];
$nama           = $_POST['nama'];
$username       = $_POST['usn'];
$password       = $_POST['pw'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_admin SET nama = '$nama', username = '$username', password = '$password' WHERE id_admin = $id ";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($db->query($query)) {
    //redirect ke halaman index.php 
    header("location: admin.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>