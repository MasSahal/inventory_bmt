<?php
$koneksi = new mysqli('localhost', 'root', '', 'db_inventory');
?>
<!doctype html>
<html lang="en">

<head>
  <title>Inventory - BMT AL ISHLAH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="favicon.png">
</head>

<body>
  <ion-icon name="pricetags"></ion-icon>

  <div class="wrapper">
    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-2">
      <div class="container-fluid">
        <div class="row mt-4">

          <div class="col">
            <h2 class="h2 text-center">Riwayat Data Produk</h2>
            <br>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class="bg-info text-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 0;
                  $isi = $koneksi->query("SELECT * FROM tb_riwayat_produk");
                  $cek = $isi->num_rows;
                  while ($data = $isi->fetch_assoc()) {
                  ?>
                    <tr>
                      <td><?= $no += 1; ?></td>
                      <td><?= $data['nama_produk']; ?></td>
                      <td><?= $data['qty_produk']; ?></td>
                      <td><?= $data['status_produk']; ?></td>
                      <td><?= $data['tanggal']; ?></td>
                      <td><?= $data['keterangan']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



    <!-- ini buat javascript -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type='text/javascript'>
      window.print();
    </script>
</body>

</html>