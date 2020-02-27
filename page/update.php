<div class="row">
  <div class="container-fluid">
    <div class="card p-4 border-left-primary shadow h-100">
      <div class="row mt-4">
        <div class="col">
          <h2 class="h2 text-center">Produk Saat Ini</h2>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
              <thead class="bg-info text-light">
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Qty</th>
                  <th>Berat (Gr)</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                $isi = $koneksi->query("SELECT * FROM tb_produk");
                while ($data = $isi->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?= $no += 1; ?></td>
                    <td><?= $data['nama_produk']; ?></td>
                    <td><?= $data['qty_produk']; ?></td>
                    <td><?= $data['berat_produk']; ?></td>
                    <td><?= $data['status_produk']; ?></td>
                    <td><?= $data['tanggal_masuk']; ?></td>
                    <td>
                      <a href="?page=edit_produk&kode=<?=$data['id_produk'];?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> Edit</a>
                      <span> | </span>
                      <a href="?page=update_stok&kode=<?=$data['id_produk'];?>" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Stok</a>
                      <span> | </span>
                      <a href="?page=hapus_produk&kode=<?=$data['id_produk'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus item ini?');"> <i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="mb-2">
              <a href="?page=add_produk" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah Produk</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class='clearfix'></div>
</div>