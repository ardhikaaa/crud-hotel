<?php
include "koneksi.php";
session_start();
// ini_set('display_errors', 0);

$login_message = "";

if (isset($_POST['login'])) {
  $username = $_POST['usn'];
  $password = $_POST['pw'];

  $sql = "SELECT * FROM tbl_admin where username='$username' and password='$password'";

  //eksekusi query
  $hasil = $db->query($sql); 

  // untuk mengambil satu baris dari hasil query database MySql
  $data = $hasil->fetch_assoc();
  isset($_SESSION["username"]) ? $_SESSION["username"] : '';
  isset($data["username"]) ? $data["username"] : '' ;

  // memeriksa apakah hasil query menghasilkan baris
  if ($hasil->num_rows > 0) {
    header("location: admin/admin.php");
  } else {
    $login_message = "akun tidak ditemukan";
  }
}
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/login.css">
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