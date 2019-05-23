<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

<script type="text/javascript">
  function Add() {
    document.getElementById('action').value="insert";

    document.getElementById("kode_barang").value="";
    document.getElementById("nama").value="";
    document.getElementById("harga").value="";
    document.getElementById("deskripsi").value="";
  }

  function Edit(index){
    document.getElementById('action').value="update";

    var table = document.getElementById("barang");
    var kode_barang = table.rows[index].cells[0].innerHTML;
    var nama = table.rows[index].cells[1].innerHTML;
    var harga = table.rows[index].cells[2].innerHTML;
    var deskripsi = table.rows[index].cells[3].innerHTML;

    document.getElementById("kode_barang").value = kode_barang;
    document.getElementById("nama").value = nama;
    document.getElementById("harga").value = harga;
    document.getElementById("deskripsi").value = deskripsi;
  }
</script>
<div class="card col-sm-12">
  <div class="card-header bg-danger">
    <h4><i class="fas fa-car mr-2"></i> Daftar Mobil</h4>
  </div>
  <div class="card-body">
    <?php if (isset($_SESSION["message"])): ?>
      <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
        <?php echo $_SESSION["message"]["message"]; ?>
        <?php unset($_SESSION["message"]); ?>
      </div>
    <?php endif; ?>
    <?php
    $koneksi = mysqli_connect("localhost","root","","online_shop");
    $sql = "select * from barang";
    $result = mysqli_query($koneksi,$sql);
    $count = mysqli_num_rows($result);
    ?>

    <?php if ($count == 0): ?>
    <div class="alert alert-info">
      Data belum tersedia
    </div>

  <?php else: ?>
      <table class="table " id="table_barang bg-primary">
        <thead>
          <tr>
            <th>kode_mobil</th>
            <th>Merk Mobil</th>
            <th>Harga Sewa Perhari</th>
            <th>Stok</th>
            <th>Image</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $hasil): ?>
            <tr>
              <td><?php echo $hasil ["kode_barang"]; ?></td>
              <td><?php echo $hasil ["nama"]; ?></td>
              <td><?php echo $hasil ["harga"]; ?></td>
              <td><?php echo $hasil ["stok"]; ?></td>
              <td>
                <img src="<?php echo "img_barang/".$hasil["image"]; ?>"
                class="img" width="100" >
              </td>
              <td>
                <button type="button" class="btn btn-info"
                  data-toggle="modal" data-target="#modal"
                  onclick="Edit(this.parentElement.parentElement.rowIndex);">
                  Edit
                </button>

                <a href="db_barang.php?hapus=barang&kode_barang=<?php echo $hasil['kode_barang']; ?>"
                  onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                  <button type="button" class="btn btn-danger">
                    Hapus
                  </button>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

  <?php endif; ?>
  </div>
  <div class="card-footer">
    <button type="button" class="btn btn-success"
      data-toggle="modal" data-target="#modal" onclick = "Add()">
      <i class="fas fa-shopping-cart mr-2"></i>
      Tambah
    </button>
  </div>
</div>
</div>

<div class="modal fade" id="modal">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <form action="db_barang.php" method="post" enctype="multipart/form-data">
      <div class="modal-header bg-primary">
        <h4><i class="fas fa-car mr-2"></i> Tambah Mobil </h4>
        <span class="close" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <input type="hidden" name="action" id="action">
        Id_Mobil
        <input type="text" name="kode_barang" id="kode_barang" class="form-control">
        Merk Mobil
        <input type="text" name="nama" id="nama" class="form-control">
        Harga Sewa Perhari
        <input type="text" name="harga" id="harga" class="form-control">
        stok
        <input type="number" name="stok" id="stok" class="form-control">
        image
        <input type="file" name="image" id="image" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">
          Simpan
        </button>
      </div>
    </form>
  </div>
</div>
</div>
