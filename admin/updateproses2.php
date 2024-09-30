<?php

//include koneksi database
include '../koneksi.php';

//get data dari form
$id             = $_POST['id'];
$jenis_kamar    = $_POST['jk'];
$harga          = $_POST['harga'];
$ket            = $_POST['ket'];

//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_jenis_kamar SET jenis_kamar = '$jenis_kamar', harga = '$harga', keterangan = '$ket' WHERE id_kamar = $id ";

//kondisi pengecekan apakah data berhasil diupdate atau tidak
if($db->query($query)) {
    //redirect ke halaman index.php 
    header("location: jenis_kamar.php");
} else {
    //pesan error gagal update data
    echo "Data Gagal Diupate!";
}

?>