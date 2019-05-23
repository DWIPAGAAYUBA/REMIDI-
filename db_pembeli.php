<?php
$koneksi = mysqli_connect("localhost","root","","online_shop");

if (isset($_POST["action"])) {
  $id_pembeli = $_POST["id_pembeli"];
  $nama = $_POST["nama"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $alamat = $_POST["alamat"];
  $kontak = $_POST["kontak"];
  $action = $_POST["action"];

  if ($action == "insert") {
    // kita tampung deskripsi file gambarnya
    $path = pathinfo($_FILES["image"]["name"]);
    // ambil ekstensi gambarnya
    $ekstensi = $path["extension"];
    // rangkai nama file yang akan disimpan
    $filename = $id_pembeli."-".rand(1.1000).".".$ekstensi;
    // rand = untuk mengambil nilai random antara 1 sampai 1000

    // simpan file gambar
    move_uploaded_file($_FILES["image"]["tmp_name"],"img_siswa/$filename");
    $sql = "insert into pembeli values('$nisn','$nama','$alamat',
    '$kontak','$username','$password','$filename')";

  } else if($action == "update") {
    // ambil data dari database
    $sql = "select * from where id_pembeli='$id_pembeli'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    // untuk mengkonversi menjadi array
    if (isset($_FILES["image"])) {
      if (file_exists("img_pembeli/".$hasil["image"])) {
        // jika file nya tersedia
        unlink("img_pembeli/".$hasil["image"]);
        // menghapus file
      }
      $path = pathinfo($_FILES["image"]["name"]);
      // ambil ekstensi gambarnya
      $extensi = $path["extension"];
      // rangkai nama file yang akan disimpan
      $filename = $id_pembeli."-".rand(1,1000).".".$extensi;
      // rand = untuk mengambil nilai random antara 1 sampai 1000

      // simpan file gambar
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_pembeli/$filename");
      $sql = "update pembeli set nama='$nama',username='$username',password='$password',alamat='$alamat',
      kontak='$kontak',image='$filename' where id_pembeli='id_pembeli'";
    } else {
      $sql = "update pembeli set nama='$nama',username='$username',password='$password',
      alamat='$alamat',kontak='$kontak' where id_pembeli='$id_pembeli'";
    }
  }
  mysqli_query($koneksi,$sql);
  header("location:dashboard.php");
}
if (isset($_GET["hapus"])) {
  // jika yang dikirim adalah variabel GET hapus
  $id_pembeli = $_GET["id_pembeli"];
  $sql = "select * from pembeli where id_pembeli='$id_pembeli'";
  // eksekusi query
  $result = mysqli_query($koneksi,$sql);
  // konversi ke array
  $hasil = mysqli_fetch_array($result);
  if (file_exists("img_pembeli/".$hasil["image"])) {
    unlink("img_pembeli/".$hasil["image"]);
    // menghapus file
  }
  $sql = "delete from pembeli where id_pembeli='$id_pembeli'";
  mysqli_query($koneksi,$sql);
  header("location:dashboard.php");
}
?>
