<?php
include "../koneksi.php";
session_start();
ini_set('display_errors', '0');


if (isset($_POST['logout'])) {
    session_destroy(); //menghapus sesi
    header('location: ../');
}

//mengecek apakah ada sesi yang masuk?
if($_SESSION['username'] == null) {
    header('location: ../login.php');
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy(); //menghapus sesi
    header('location: ../');
}

if (isset($_POST['add'])) {
    $jeniskamar = $_POST['jk'];
    $harga = $_POST['harga'];
    $ket = $_POST['ket'];
    
  //query disimpan dalam var $sql
  $sql = "insert into tbl_jenis_kamar
  ( jenis_kamar, harga, keterangan) values
  ('$jeniskamar', '$harga', '$ket')";
  
  //validasi
  //jika query berhasil dieksekusi
  if ($db->query($sql)) {
    header("location: jenis_kamar.php");
  } else {
    echo "data gagal";
  }
  }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- icon -->
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-bold-straight/css/uicons-bold-straight.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.4.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php">Expro Hotel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form method="POST" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            
            <!-- Navbar-->
            
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <a class="nav-link active me-4" style="color: white">Selamat Datang <?php echo $_SESSION["username"]?> </a>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><input type="submit" value="Logout" class="btn float-right login_btn" name="logout"></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fi fi-bs-admin-alt"></i></div>
                                Admin
                            </a>
                            <a class="nav-link" href="jenis_kamar.php">
                                <div class="sb-nav-link-icon"><i class="fi fi-rr-bed-alt"></i></div>
                                Jenis Kamar
                            </a>
                            <a class="nav-link" href="penyewaan.php">
                                <div class="sb-nav-link-icon"><i class="fi fi-rr-clock"></i></div>
                                Penyewaan
                            </a>
                            <a class="nav-link" href="booking.php">
                                <div class="sb-nav-link-icon"><i class="fi fi-rr-clipboard-list"></i></div>
                                Booking Kamar
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["username"]?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container ps-5">
    
                <h2 class="mt-3">Tambah Jenis Kamar</h2>

        <form action="updateproses.php" method="POST">
                <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="jk">
            <label for="floatingInput">Jenis Kamar</label>
                </div>
                <div class="form-floating">
            <input type="text" class="form-control" id="floatingPassword" placeholder="Harga" name="harga">
            <label for="floatingPassword">Harga</label>
                </div>
                <div class="form-floating mb-3">
            <input type="text" class="form-control mt-3" id="floatingInput" placeholder="name@example.com" name="ket">
            <label for="floatingInput">Keterangan</label>
                </div>
                

        <input type="submit" class="mt-5 btn btn-success" name="add">

        </form>
</div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid text-center">
                           <p>Copyright &copy; Ardhika Raditya 2023</p>
                    </div>
                </footer>
            </div>
        </form>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
