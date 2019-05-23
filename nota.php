<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<div class="card col-sm-12">
  <div class="card-header">
    <h3>Nota Transaksi</h3>
  </div>
  <div class="card-body">
    <?php
    $koneksi = mysqli_connect("localhost","root","","online_shop");
    $id_transaksi = $_GET["id_transaksi"];
    // data transaksi
    $sql = "select t.id_transaksi, p.nama, t.tgl
    from transaksi t inner join pembeli p
    on t.id_pembeli = p.id_pembeli
    where t.id_transaksi='$id_transaksi'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);

    // data barang
    $sql2 = "select b.*, dt.jumlah, dt.harga_beli
    from barang b inner join detail_transaksi dt
    on b.kode_barang = dt.kode_barang
    where dt.id_transaksi='$id_transaksi'";

    $result2 = mysqli_query($koneksi,$sql2);
    ?>

    <h4>ID. Transaksi: <?php echo $hasil["id_transaksi"]; ?></h4>
    <h4>Nama Pemesan: <?php echo $hasil["nama"]; ?></h4>
    <h4>Tgl. Transaksi: <?php echo $hasil["tgl"]; ?></h4>

    <table class="table">
      <thead>
        <tr>
          <th>Kode Mobil</th>
          <th>Jenis Mobil</th>
          <th>jumlah Mobil</th>
          <th>Harga Sewa Per-Hari</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php $total = 0; foreach ($result2 as $barang): ?>
          <tr>
            <td><?php echo $barang["kode_barang"]; ?></td>
            <td><?php echo $barang["nama"]; ?></td>
            <td><?php echo $barang["jumlah"]; ?></td>
            <td><?php echo "Rp".number_format($barang["harga"]); ?></td>
            <td><?php echo "Rp".number_format($barang["harga"]*$barang["jumlah"]); ?></td>
          </tr>
        <?php
      $total += $barang["harga"]*$barang["jumlah"];
      endforeach;
      ?>
      </tbody>
    </table>
    <h2 class="text-right text-success">
      <?php echo "Rp".number_format($total); ?>
    </h2>
  </div>
</div>
