<?php
session_start();
include('../koneksi.php');

 $id = $_GET['id_kamar'];
  
 $query = "SELECT * FROM tbl_jenis_kamar WHERE id_kamar = $id LIMIT 1";

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
                    <form action="updateproses2.php" method="POST">
                        <div class="mb-3">
                            <h2 class="mt-3">Edit Jenis Kamar</h2>
                          <label for="exampleInputEmail1" class="form-label">Jenis Kamar</label><br>
                          <input type="text" name="jk" style="width: 50%; height: 20px" value="<?php echo $row['jenis_kamar'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <input type="hidden" name="id" value="<?php echo $row['id_kamar'] ?>">

                      </div>
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Harga</label><br>
                          <input type="text" name="harga" style="width: 50%; height: 20px" value="<?php echo $row['harga'] ?>" class="form-control" id="exampleInputPassword1">
                      </div>
                      <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Keterangan</label><br>
                          <input type="text" name="ket" style="width: 50%; height: 20px" value="<?php echo $row['keterangan'] ?>" class="form-control" id="exampleInputPassword1">
                      </div>
                      
                      <button type="submit" class="btn btn-success"  style="margin-top: 2%; height: 30px; width: 350px; background-color: green; border: green; color: white">Submit</button>
                      </form>
                  </div>
</body>
</html>