<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<script type="text/javascript">
  function Print(){
    var printDocument = document.getElementById("report").innerHTML;
    var originalDocument = document.body.innerHTML;
    document.body.innerHTML = printDocument;
    window.print();
    document.body.innerHTML = originalDocument;
  }
</script>
<div id="report" class="card col-sm-12">
  <div class="card-header bg-danger">
    <h4><i class="fas fa-shopping-cart mr-2"></i> Struk Transaksi</h4>
  </div>
  <div class="card-body">
    <?php
    $koneksi = mysqli_connect("localhost","root","","online_shop");
    $sql = "select t.*, p.nama
    from transaksi t inner join pembeli p
    on t.id_pembeli = p.id_pembeli";
    $result = mysqli_query($koneksi,$sql);
    ?>
    <table class="table bg-primary">
      <thead>
        <tr>
          <th>Tanggal Transaksi</th>
          <th>Kode Transaksi </th>
          <th>Nama Penyewa</th>
          <th>Option</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $hasil): ?>
          <tr>
            <td><?php echo $hasil["tgl"]; ?></td>
            <td><?php echo $hasil["id_transaksi"]; ?></td>
            <td><?php echo $hasil["nama"]; ?></td>
            <td>
              <a href="template.php?page=nota&id_transaksi=<?php echo $hasil["id_transaksi"]; ?>">
                <button type="button" class="btn btn-info">
                  details
                </button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <button onclick="Print()" type="button" class="btn btn-success">
      Print
    </button>
  </div>
</div>
