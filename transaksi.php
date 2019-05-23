<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Barang</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
      function Add(){
        // set input action menjadi "insert"
        document.getElementById('action').value="insert";

        // kosongkan inputan form-datanya
        document.getElementById("id_transaksi").value="";
        document.getElementById("kode_barang").value="";
        document.getElementById("id_pembeli").value="";
      }

      function Edit(index){
        // set input action menjadi "update"
        document.getElementById('action').value="update";

        // set form-nya berdasarkan data table yang dipilih
        var table = document.getElementById("transaksi");
        // tampung data dari tabel
        var id_transaksi = table.rows[index].cells[0].innerHTML;
        var kode_barang = table.rows[index].cells[1].innerHTML;
        var id_pembeli = table.rows[index].cells[2].innerHTML;

        // keluarkan pada Form
        document.getElementById("id_transaksi").value = nisn;
        document.getElementById("kode_barang").value = nama;
        document.getElementById("id_pembeli").value = alamat;
        document.getElementById("tgl").value = nama;
      }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="card col-sm-12">
        <div class="card-header">
          <h4>Daftar Transaksi</h4>
        </div>
        <div class="card-body">
          <?php
          $koneksi = mysqli_connect("localhost","root","","online_shop");
          $sql = "select * from transaksi";
          $result = mysqli_query($koneksi,$sql);
          $count = mysqli_num_rows($result);
          ?>

          <?php if ($count == 0){ ?>
          <div class="alert alert-info">
            Data belum tersedia
          </div>

        <?php }else{ ?>
          <table class="table" id="transaksi">
            <thead>
              <tr>
                <th>id_transaksi</th>
                <th>kode_barang</th>
                <th>id_pembeli</th>
                <th>tgl</th>
              </tr>
            </thead>
            <tbody>
        <?php foreach ($result as $hasil): ?>
                <tr>
                  <td><?php echo $hasil ["id_transaksi"]; ?></td>
                  <td><?php echo $hasil ["kode_barang"]; ?></td>
                  <td><?php echo $hasil ["id_pembeli"]; ?></td>
                  <td><?php echo $hasil ["tgl"]; ?></td>
                  <td>
                    <button type="button" class="btn btn-info"
                      data-toggle="modal" data-target="#modal"
                      onclick="Edit(thus.parentElement.parentElement.rowIndex);">
                    </button>

                    <a href="db.php?hapus=transaksi&id_transaksi=<?php echo $hasil['id_transaksi']; ?>"
                      onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                      <button type="button" class="btn btn-danger">
                        Hapus
                      </button>
                    </a>
                  </td>
                </tr>
        <?php endforeach; ?>
            </tbody>
          </table>

        <?php } ?>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-success"
            data-toggle="modal" data-target="#modal" onclick="Add()">
            Tambah
          </button>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="nota.php" method="post">
            <div class="modal-header">
              <h4>Form Transaksi</h4>
              <span class="close" data-dismiss="modal">&times;</span>
            </div>
            <div class="modal-body">
              <input type="hidden" name="action" id="action">
              id_transaksi
              <input type="text" name="id_transaksi" id="id_transaksi" class="form-control">
              kode_mobil
              <input type="text" name="kode_barang" id="kode_barang" class="form-control">
              id_penyewa
              <input type="text" name="id_pembeli" id="id_pembeli" class="form-control">
              tgl
              <input type="text" name="tgl" id="tgl" class="form-control">
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
  </body>
</html>
