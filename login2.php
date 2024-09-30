<?php
include "koneksi.php";
session_start();

$login_message = "";

if (isset($_POST['login'])) {
  $username = $_POST['usn'];
  $password = $_POST['pw'];

  $sql = "SELECT * FROM tbl_admin where username='$username' and password='$password'";

  //eksekusi query
  $hasil = $db->query($sql); 

  // untuk mengambil satu baris dari hasil query database MySql
  $data = $hasil->fetch_assoc();
  $_SESSION["username"] = $data["username"];

  // memeriksa apakah hasil query menghasilkan baris
  if ($hasil->num_rows > 0) {
    header("location: admin/admin.php");
  } else {
    $login_message = "akun tidak ditemukan";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header text-center mt-4">
				<h3>Log In</h3>
			</div>
			<div class="card-body">
				<form method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username" name="usn">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="pw">
					</div>
					<div class="form-group mt-5">
						<input type="submit" value="Login" class="btn float-right login_btn" name="login">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Selamat Datang Di Expro Hotel
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>