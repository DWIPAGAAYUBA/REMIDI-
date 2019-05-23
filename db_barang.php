<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","online_shop");
if (isset($_POST["action"])) {
  $kode_barang = $_POST["kode_barang"];
  $nama = $_POST["nama"];
  $harga = $_POST["harga"];
  $stok = $_POST["stok"];
  $deskripsi = $_POST["deskripsi"];

  if ($_POST["action"] == "insert") {
    $path = pathinfo($_FILES["image"]["name"]);
    // ambil ekstensi gambarnya
    $extensi = $path["extension"];
    // rangkai nama file yang akan disimpan
    $filename = $kode_barang."-".rand(1,1000).".".$extensi;
    // rand = untuk mengambil nilai random antara 1 sampai 1000

    $sql = "insert into barang values('$kode_barang','$nama','$harga',
    '$stok','$deskripsi','$filename')";

    if (mysqli_query($koneksi,$sql)) {
      // jika eksekusi berhasil
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_barang/$filename");
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "insert data has been success"
      );
    }else {
      // jika eksekusi gagal
      $_SESSION["message"] =  array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=barang");
  }else if ($_POST["action"] == "update") {
    if (!empty($_FILES["image"]["name"])) {
      // jika gambar diedit
    $sql = "select * from barang where kode_barang='$kode_barang'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    // hapus file lama
    if (file_exists("img_barang/".$hasil["image"])) {
    unlink("img_barang/".$hasil["image"]);
    }

    // membuat nama file yang baru
    $path = pathinfo($_FILES["image"]["name"]);
    $extensi = $path["extension"];
    $filename = $kode_barang."-".rand(1,1000).".".$extensi;

    // membuat perintah update
    $sql = "update barang set nama='$nama',harga='$harga',
    stok='$stok',deskripsi='$deskripsi',image='$filename'
    where kode_barang='$kode_barang'";

    if (mysqli_query($koneksi,$sql)) {
      // jika query sukses
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_barang/$filename");
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "update data has been success"
      );
    }else{
      // jika gambar tidak diedit
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
        );
    }
    }else {
      // code...
      $sql = "update barang set nama='$nama',harga='$harga',
      stok='$stok',deskripsi='$deskripsi', where kode_barang='$kode_barang'";
      if (mysqli_query($koneksi,$sql)) {
        // code...
        move_uploaded_file($_FILES["image"]["tmp_name"],"img_barang/$filename");
        $_SESSION["message"] = array(
          "type" => "success",
          "message" => "update data has been success"
        );
      }else {
        // code...
        $_SESSION["message"] = array(
          "type" => "danger",
          "message" => mysqli_error($koneksi)
        );
      }
    }
  }
}

if (isset($_GET["hapus"])) {
  $kode_barang = $_GET["kode_barang"];
  $sql = "select * from barang where kode_barang='$kode_barang'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (file_exists("img_barang/".$hasil["gambar"])) {
    // code...
    unlink("img_barang/".$hasil["gambar"]);
  }
  $sql = "delete from barang where kode_barang='$kode_barang'";
  mysqli_query($koneksi,$sql);
  if (mysqli_query($koneksi,$sql)) {
    $_SESSION["message"] = array(
      "type" => "success",
      "message" => "data has been deleted"
    );

  }else {
    $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
    );
  }
  header("location:template.php?page=barang");
}
?>
