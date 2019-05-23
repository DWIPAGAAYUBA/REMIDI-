<!-- <?php session_start(); ?>
<?php if (isset($_SESSION["session_admin"])): ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
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
<?php else: ?>
  <?php echo "Anda belum login!"; ?>
  <hr>
  <a href="login_karyawan.php">
    Loginnya tuh disini
  </a>
<?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>
  </body>
</html>