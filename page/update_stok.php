<?php
$id = $_GET['kode'];
$ambil_data = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id'");
$data = $ambil_data->fetch_assoc();
?>
<div class="row mt-2">
    <div class="container-fluid">
        <div class="card shadow h-100">
            <section class="form">
                <div class="card bg-dark-50 text-dark p-4 shadow border-dark-50">
                    <h2 class="text-center p-2">Tambah Produk</h2>
                    <form action="#" method="post" enctype="multipart/form-data" class="">
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" readonly name="nama" id="nama" class="form-control" value="<?= $data['nama_produk']; ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="stok">Tambah Stok (Qty)</label>
                            <input type="number" name="stok" id="stok" class="form-control" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat (Gr)</label>
                            <input type="number" readonly name="berat" id="berat" class="form-control" value="<?= $data['berat_produk']; ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea rows="4" readonly class="form-control" name="deskripsi" required><?= $data['deskripsi_produk']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea rows="4" class="form-control" name="keterangan" required></textarea>
                        </div>
                        <div class="form-group">
                        <label>Foto Poduk</label><br>
                        <img src="foto_produk/<?= $data['foto_produk']; ?>" class="img-responsive img-thumbnail" alt="">
                        </div>
                        <div class="mt-5">
                            <input type="reset" value="Ulangi" class="btn btn-warning btn-sm"> | 
                            <input type="submit" value="Tambah Stok" name="tambah_stok" class="btn btn-success btn-sm">
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<?php
date_default_timezone_set('ASIA/JAKARTA');
if (isset($_POST['tambah_stok'])) {

    $qty_produk = $_POST['stok'];
    $jumlah_qty = $qty_produk + $data['qty_produk'];

    //masukan qty ke tb_produk karena sudan menambah stok
    $upp_produk = $koneksi->query("UPDATE tb_produk SET qty_produk='$jumlah_qty' WHERE id_produk='$id'");

    // masukan ke tb_riwayat_produk
    $id_produk = $data['id_produk'];
    $nama_produk = $data['nama_produk'];
    $tgl = date('Y-m-d H:i:s');
    $keterangan = $_POST['keterangan'];


    $add_stok_produk = $koneksi->query("INSERT INTO tb_riwayat_produk (id_produk, nama_produk, qty_produk, status_produk, tanggal, keterangan) 
    VALUES ('$id_produk','$nama_produk','$qty_produk','Masuk','$tgl','$keterangan')");

    if ($add_stok_produk && $upp_produk == 'success') {
        echo "
        <script>alert('Berhasil Menambahkan Stok Produk ! ');</script>
        <meta http-equiv='refresh' content='0;url=index.php?page=update'>";
    } else {
        echo "<script>alert('Gagal Tambah Stok Produk ! ');</script>";
    }
}