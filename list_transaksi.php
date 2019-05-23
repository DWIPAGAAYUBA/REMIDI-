<div class="card col-sm-12">
  <div class="card-header">
    <h4>Barang Yang Akan Dibeli</h4>
  </div>
  <div class="card-body">
    <form action="db_transaksi.php?checkout=true" method="post"
    onsubmit="return confirm('Apakah Anda yakin dengan pesanan ini?')">
    <table class="table">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Merk</th>
          <th>Image</th>
          <th>Stok</th>
          <th>Harga</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($_SESSION["session_transaksi"] as $hasil): ?>
          <tr>
            <td><?php echo $hasil["kode_barang"]; ?></td>
            <td><?php echo $hasil["nama"]; ?></td>
            <td><?php echo $hasil["deskripsi"]; ?></td>
            <td>
              <img src="img_barang/<?php echo $hasil["image"]; ?>" width="100" class="img">
            </td>
            <td>
              <input type="number" name="jumlah<?php echo $hasil["kode_barang"];?>" min="1">
            </td>
            <td><?php echo $hasil["harga"]; ?></td>
            <td>
              <a href="db_transaksi.php?hapus=true&kode_barang=<?php echo $hasil["kode_barang"]; ?>">
                <button type="button" class="btn btn-danger">Hapus</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <button type="submit" class="btn btn-block btn-primary">
      CHECKOUT
    </button>
    </form>
  </div>
</div>
