<?php
session_start();
$username = $_POST["username"];
$password = md5($_POST["password"]);

  // is set?
$koneksi = mysqli_connect("localhost","root","","online_shop");
$sql = "select * from admin where username='$username' and password='$password'";
$result = mysqli_query($koneksi,$sql);
$jumlah = mysqli_num_rows($result);

if ($jumlah == 0) {
  // jika jumlah datanya = 0 berarti username/password salah
  $_SESSION["message"] = array(
    "type" => "danger",
    "message" => "Username/Password Salah"
  );
  header("location:login_karyawan.php");
} else {
  // buat variabel session
  $_SESSION["session_admin"] = mysqli_fetch_array($result);
  $_SESSION["session_transaksi"] = array();
  header("location:dashboard.php");
}

if (isset($_GET["logout"])) {
  // hapus session-nya
  session_destroy();
  header("location:login_karyawan.php");
}

?>
