<?php
include "../koneksi.php";

$id = $_GET['id_admin'];

$query = "DELETE FROM tbl_admin WHERE id_admin = $id";

if(mysqli_query($db, $query)) {
    header("location: admin.php");
} else{
    echo "gagal";
}
?>