<div class="row mt-2">
    <div class="container-fluid">
        <section class="form">
            <div class="card bg-dark-50 text-dark p-4 shadow border-dark-50">
                <h2 class="text-center p-2">Tambah Produk</h2>
                <form action="#" method="post" enctype="multipart/form-data" class="">
                    <div class="form-group">
                        <label for="nama">Nama Produk</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Produk</label>
                        <input type="number" name="harga" id="harga" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok (Qty)</label>
                        <input type="number" name="stok" id="stok" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat (Gr)</label>
                        <input type="number" name="berat" id="berat" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea rows="4" class="form-control" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label><br>
                        <input type="file" name="foto" required>
                        <small>Foto tidak lebih dari 2Mb | Ukuran foto 600x300</small>
                    </div>
                    <div class="mt-5">
                        <input type="reset" value="Ulangi" class="btn btn-warning btn-sm"> | 
                        <input type="submit" value="Tambah" name="tambah" class="btn btn-success btn-sm">
                    </div>
                </form>
            </div>
        </section>
    </div>
</div>
<?php
date_default_timezone_set('ASIA/JAKARTA');
if (isset($_POST['tambah'])) {
    $nama_produk = $_POST['nama'];
    $harga_produk = $_POST['harga'];
    $qty_produk = $_POST['stok'];
    $berat_produk = $_POST['berat'];
    $deskripsi_produk = $_POST['deskripsi'];
    $tgl = date('Y-m-d H:i:s');

    //ambil data foto
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasi, "foto_produk/" . $nama);

    $add_produk = $koneksi->query("INSERT INTO tb_produk (nama_produk, qty_produk, berat_produk, foto_produk, deskripsi_produk, status_produk, tanggal_masuk, harga_produk) 
    VALUES ('$nama_produk','$qty_produk','$berat_produk','$nama','$deskripsi_produk','Masuk','$tgl','$harga_produk')");

    if ($add_produk == 'success') {
        echo "
        <script>alert('Berhasil Menambahkan Produk ! ');</script>
        <meta http-equiv='refresh' content='0;url=index.php?page=inventory'>";
    } else {
        echo "<script>alert('Gagal Tambah Produk ! ');</script>";
    }
}