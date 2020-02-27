<div class="row">
  <div class="container-fluid">
    <div class="card shadow h-100">
      <div class="card-body">
        <div class="row mt-4">
          <div class="col">
            <h4 class="text-lg font-weight-bold text-dark text-center text-uppercase mb-1">Riwayat Data Produk</h4>

            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="table">
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
              <?php
              if ($cek != 0) { ?>
                <form method="post" class="my-2">
                  <button type="submit" name="hapus_semua" onclick="return confirm('Yakin ingin hapus semua riwayat?')" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i>Bersihkan Riwayat</button>
                  <a href="cetak.php" target="_blank" class="btn btn-sm btn-info btn-xs"><i class="fa fa-print"></i> Cetak</a>
                </form>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class='clearfix'></div>
</div>
<?php
if (isset($_POST['hapus_semua'])) {
  $koneksi->query("DELETE FROM tb_riwayat_produk");
  echo "<script>alert('Berhasil Menghapus Riwayat Produk ! ');</script>";
  echo "<meta http-equiv='refresh' content='0;url=index.php?page=riwayat'>";
}
