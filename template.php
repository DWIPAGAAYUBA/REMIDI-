
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  </head>
  <body> 
    <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
    <div class="container">

    <h3><i class="fas fa-car-alt mr-2 "></i></h3>
    
    <a class="navbar-brand" href="#"><b>RENTCAR.ID</b> | Hai Admin </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    
        <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <div class="icon ml-4">
            <h5>
            <i class="fas fa-envelope mr-3" data-toggle="tooltips" title="Email Masuk"></i> 
            <i class="fas fa-bells mr-3" data-toggle="tooltips" title="Notifikasi Masuk"></i>
            </h5>
        </div>
    </div>
    </nav>
    <div class="row mt-5 no-gutters">
 <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
 <ul class="nav flex-column ml-3 mb-5">
  <li class="nav-item">
    <a class="nav-link active text-white" href="dashboard.php"><i class="fas fa-tachometer-alt mr-2 "></i> Dashboard</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="mobil.php"><i class="fas fa-car mr-2 "></i> Mobil</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="pelanggan.php"><i class="fas fa-users mr-2 "></i> Pelanggan</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="transaksi.php"><i class="fas fa-shopping-cart mr-2 "></i> Penyewaan</a><hr class="bg-secondary">
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="login_karyawan.php"><i class="fas fa-sign-out-alt mr-3 "></i> Logout</a><hr class="bg-secondary">
  </li>
</ul>
 </div>
<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-tachometer-alt mr-2"></i> DASHBOARD</h3><hr>

    <div class="row text-white">
            <div class="card bg-info ml-5" style="width: 18rem;">
            <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-car mr-2"></i>
            </div>
            <h5 class="card-title">JUMLAH MOBIL</h5>
            <div class="display-4">2</div>
            <a href="mobil.php" class=""><p class="card-text text-white">Lebih Detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
        </div>
        </div>

        <div class="card bg-success ml-5" style="width: 18rem;">
            <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-users mr-2"></i>
            </div>
            <h5 class="card-title">JUMLAH PELANGGAN</h5>
            <div class="display-4">5</div>
            <a href="pelanggan.php" class=""><p class="card-text text-white">Lebih Detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
        </div>
        </div>

        <div class="card bg-danger ml-5" style="width: 18rem;">
            <div class="card-body">
            <div class="card-body-icon">
            <i class="fas fa-shopping-cart mr-2"></i>
            </div>
            <h5 class="card-title">JUMLAH PENYEWAAN</h5>
            <div class="display-4">2</div>
            <a href="daftar_penyewaan.php" class=""><p class="card-text text-white">Lebih Detail<i class="fas fa-angle-double-right ml-2"></i></p></a>
        </div>
        </div>

    </div>
  </div>
</div>


<!-- <?php session_start(); ?>
<?php if (isset($_SESSION["session_admin"])): ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Navbar</title>
    <!-- Load bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Load jquery and bootstrap js -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
      <!--
      navbar-expand-md -> menu akan dihidden ketika ditampilkan device berukuran medium
      bg-danger - navbar mempunyai background warna merah
      navbar-dark -> tulisan menu pada navabr akan lebih gelap
      fixed-top -> navbar akan berposisi SELALU DI ATAS -->
    

      <!-- pemanggilan icon menu saat menubar disembunyikan -->
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
        <span class="navbar navbar-toggler-icon"></span>
      </button>

      <!--daftar menu pada navbar -->
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav">
          <li class="nav-item"><a href="template.php?page=pembeli" class="nav-link">Pembeli</a></li>
          <li class="nav-item"><a href="template.php?page=admin" class="nav-link">Admin</a></li>
          <li class="nav-item"><a href="template.php?page=barang" class="nav-link">Barang</a></li>
          <li class="nav-item"><a href="template.php?page=daftar_pembelian" class="nav-link">Daftar Pembelian</a></li>
          <li class="nav-item"><a href="proses_login_admin.php?logout=true" class="nav-link">Logout</a></li>

        </ul>
      </div>
      <h5 class="text-white">welcome, <?php echo $_SESSION["session_admin"]["nama"]; ?></h5>
    </nav>
    <div class="container my-2">
      <?php if (isset($_GET["page"])): ?>
        <?php if ((@include $_GET["page"].".php") === true): ?>
          <?php include $_GET("page").".php"; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </body>
</html>
<?php else: ?>
  <?php echo "Anda belum login!"; ?>
  <hr>
  <a href="login_admin.php">
    Loginnya tuh disini
  </a>
<?php endif; ?> 
