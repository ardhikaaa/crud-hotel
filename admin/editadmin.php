<?php
session_start();
include('../koneksi.php');
$id = $_GET['id_admin'];
  
$query = "SELECT * FROM tbl_admin WHERE id_admin = $id LIMIT 1";

  // $hasil = mysqli_query($db, $query);
  
// eksekusi query
      $hasil = $db->query($query);

  // untuk mengambil baris data hasil queri, yg nantinya akan diambil di form
  $row = mysqli_fetch_array($hasil);
  // $data = mysqli_fetch_assoc($hasil);

  
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container ps-5" style="text-align: center">
                    <form action="updateproses.php" method="POST">
                        <div class="mb-3">
                        <h1 class="mt-3">Edit Data Admin</h1>
                            <label for="exampleInputEmail1" class="form-label" style="font-size: 25px">Nama</label><br>
                            <input type="text" name="nama" style="width: 50%; height: 20px" value="<?php echo $row['nama'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <input type="hidden" name="id" value="<?php echo $row['id_admin'] ?>">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="font-size: 25px">Username</label><br>
                            <input type="text" name="usn" style="width: 50%; height: 20px" value="<?php echo $row['username'] ?>" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" style="font-size: 25px">Password</label><br>
                            <input type="password" name="pw" style="width: 50%;  height: 20px" value="<?php echo $row['password'] ?>" class="form-control" id="exampleInputPassword1">
                        </div>
                        
                        <button type="submit" class="btn" style="margin-top: 2%; height: 30px; width: 350px; background-color: green; border: green; color: white">Submit</button>
                        </form>
                </div>
</body>
</html>