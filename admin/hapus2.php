<?php
include "../koneksi.php";

$id = $_GET['id_kamar'];

$query = "DELETE FROM tbl_jenis_kamar WHERE id_kamar = $id";

if(mysqli_query($db, $query)) {
    header("location: jenis_kamar.php");
} else{
    echo "gagal";
}
?>