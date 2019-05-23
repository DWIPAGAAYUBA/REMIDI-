<?php
$koneksi = mysqli_connect("localhost","root","","online_shop");

if (isset($_POST["action"])) {
  $nip = $_POST["id_admin"];
  $nama = $_POST["nama"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $action = $_POST["action"];

  if ($action == "insert") {
    // kita tampung deskripsi file gambarnya
    $path = pathinfo($_FILES["image"]["name"]);
    // ambil ekstensi gambarnya 
    $extensi = $path["extension"];
    // rangkai nama file yang akan disimpan
    $filename = $id_admin."-".rand(1,1000).".".$extensi;
    // rand = untuk mengambil nilai random antara 1 sampai 1000

    // simpan file gambar
    move_uploaded_file($_FILES["image"]["tmp_name"],"img_admin/$filename");
    $sql = "insert into admin values('$id_admin','$nama','$username',
    '$password','$filename')";

  } else if($action == "update") {
    // ambil data dari database
    $sql = "select * from where id_admin='$id_admin'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    // untuk mengkonversi menjadi array
    if (isset($_FILES["image"])) {
      if (file_exists("img_admin/".$hasil["image"])) {
        // jika file nya tersedia
        unlink("img_admin/".$hasil["image"]);
        // menghapus file
      }
      $path = pathinfo($_FILES["image"]["name"]);
      // ambil ekstensi gambarnya
      $extensi = $path["extension"];
      // rangkai nama file yang akan disimpan
      $filename = $id_admin."-".rand(1,1000).".".$extensi;
      // rand = untuk mengambil nilai random antara 1 sampai 1000

      // simpan file gambar
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_admin/$filename");
      $sql = "update admin set nama='$nama',username='$username',
      password='$password',image='$filename' where id_admin='$id_admin'";
    } else {
      $sql = "update admin set nama='$nama',username='$username',
      password='$password' where id_admin='$id_admin'";
    }
}
  mysqli_query($koneksi,$sql);
  header("location:template.php?page=admin");
}
if (isset($_GET["hapus"])) {
  // jika yang dikirim adalah variabel GET hapus
  $nip = $_GET["nip"];
  $sql = "select * from admin where id_admin='$id_admin'";
  // eksekusi query
  $result = mysqli_query($koneksi,$sql);
  // konversi ke array
  $hasil = mysqli_fetch_array($result); 
  if (file_exists("img_admin/".$hasil["image"])) {
    unlink("img_admin/".$hasil["image"]);
    // menghapus file
  }
  $sql = "delete from admin where id_admin='$id_admin'";
  mysqli_query($koneksi,$sql);
  header("location:template.php?page=admin");
}
?>
