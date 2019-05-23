<link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>

<script type="text/javascript">
  function Add() {
    document.getElementById('action').value="insert";

    document.getElementById("id_pembeli").value="";
    document.getElementById("nama").value="";
    document.getElementById("alamat").value="";
    document.getElementById("kontak").value="";
  }

  function Edit(index){
    document.getElementById('action').value="update";

    var table = document.getElementById("pembeli");
    var id_pembeli = table.rows[index].cells[0].innerHTML;
    var nama = table.rows[index].cells[1].innerHTML;
    var alamat = table.rows[index].cells[2].innerHTML;
    var kontak = table.rows[index].cells[3].innerHTML;

    document.getElementById("id_pembeli").value =  nisn;
    document.getElementById("nama").value = nama;
    document.getElementById("alamat").value = alamat;
    document.getElementById("kontak").value = kontak;
  }
</script>
<div class="card col-sm-12">
  <div class="card-header bg-danger">
    <h4><i class="fas fa-users mr-2"></i> Daftar Pelanggan</h4>
  </div>
  <div class="card-body">
    <?php
    $koneksi = mysqli_connect("localhost","root","","online_shop");
    $sql = "select * from pembeli";
    $result = mysqli_query($koneksi,$sql);
    $count = mysqli_num_rows($result);
    ?>

    <?php if ($count == 0): ?>
    <div class="alert alert-info">
      Data belum tersedia
    </div>

  <?php else: ?>
    <table class="table" id="pembeli">
      <thead>
        <tr>
          <th>id_pelanggan</th>
          <th>nama</th>
          <th>username</th>
          <th>password</th>
          <th>alamat</th>
          <th>kontak</th>
          <th>image</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($result as $hasil): ?>
      <tr>
        <td><?php echo $hasil ["id_pembeli"]; ?></td>
        <td><?php echo $hasil ["nama"]; ?></td>
        <td><?php echo $hasil ["alamat"]; ?></td>
        <td><?php echo $hasil ["kontak"]; ?></td>
        <td><?php echo $hasil ["username"]; ?></td>
        <td><?php echo $hasil ["password"]; ?></td>
        <td>
          <img src="<?php echo "img_pembeli/".$hasil["image"]; ?>"
          class="img" width="100" >
        </td>
        <td>
          <button type="button" class="btn btn-info"
            data-toggle="modal" data-target="#modal"
            onclick="Edit(this.parentElement.parentElement.rowIndex);">
            Edit
          </button>

          <a href="db_siswa.php?hapus=pembeli&id_pembeli=<?php echo $hasil['id_pembeli']; ?>"
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
    Tambah
    </button>
  </div>
</div>
</div>

<div class="modal fade" id="modal">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <form action="db_pembeli.php" method="post" enctype="multipart/form-data">
      <div class="modal-header bg-primary">
        <h4><i class="fas fa-users mr-2 "></i> Form Penyewa</h4>
        <span class="close" data-dismiss="modal">&times;</span>
      </div>
      <div class="modal-body">
        <input type="hidden" name="action" id="action">
        id_penyewa
        <input type="text" name="id_pembeli" id="id_pembeli" class="form-control">
        nama
        <input type="text" name="nama" id="nama" class="form-control">
        username
        <input type="text" name="username" id="username" class="form-control">
        password
        <input type="password" name="password" id="password" class="form-control">
        alamat
        <input type="text" name="alamat" id="alamat" class="form-control">
        kontak
        <input type="text" name="kontak" id="kontak" class="form-control">
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
