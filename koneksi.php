<?php
$hostname = "localhost"; // alamat server database mysql
$username = "root"; // nama pengguna untuk mengakses database. isinya default
$password = ""; // kata sandi untuk mengisi database. isisnya default
$database_name = "db_hotel"; // nama database yang di koneksikan

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error){
    echo "Koneksi Gagal !";
}

?>