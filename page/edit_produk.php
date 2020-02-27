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
                    <h2 class="text-center p-2">Edit Produk</h2>
                    <form action="#" method="post" enctype="multipart/form-data" class="">
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama_produk']; ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="qty">Stok (Qty)</label>
                            <input type="number" readonly name="qty" id="qty" class="form-control" value="<?= $data['qty_produk']; ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat (Gr)</label>
                            <input type="number" name="berat" id="berat" class="form-control" value="<?= $data['berat_produk']; ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea rows="4" class="form-control" name="deskripsi" required><?= $data['deskripsi_produk']; ?></textarea>
                        </div>
                        <div class="form-group">
                        <label>Foto Poduk</label><br>
                        <img src="foto_produk/<?= $data['foto_produk']; ?>" class="img-responsive img-thumbnail" alt=""><br>
                        <small><a href="#" data-toggle="modal" data-target="#ubahFoto">Ubah Foto Produk</a></small>
                        </div>
                        <div class="mt-5">
                            <input type="reset" value="Ulangi" class="btn btn-warning btn-sm"> | 
                            <input type="submit" value="Simpan" name="ubah_produk" class="btn btn-success btn-sm">
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ubahFoto" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="foto">Foto</label><br>
                        <input type="file" name="foto" required>
                        <small>Foto tidak lebih dari 2Mb</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="ubahfoto" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
date_default_timezone_set('ASIA/JAKARTA');
if (isset($_POST['ubahfoto'])) {
        //ambil data foto
        $nama = $_FILES['foto']['name'];
        $lokasi = $_FILES['foto']['tmp_name'];
        if (!empty($lokasi)) {
            move_uploaded_file($lokasi, "foto_produk/" . $nama);

            $ubah_foto = $koneksi->query("UPDATE tb_produk SET foto_produk='$nama' WHERE id_produk='$id'");

            if ($ubah_foto = 'success') {
                echo "
                    <script>alert('Berhasil Ubah Foto Produk ! ');</script>
                    <meta http-equiv='refresh' content='0;url=index.php?page=edit_produk&kode=$id'>";
            } else {

                echo "<script>alert('Gagal Ubah Foto Produk ! ');</script>";
            }
        }
    }
if (isset($_POST['ubah_produk'])) {

    $nama_produk = $_POST['nama'];
    $berat_produk = $_POST['berat'];
    $deskripsi_produk = $_POST['deskripsi'];

    $up = $koneksi->query("UPDATE tb_produk SET nama_produk='$nama_produk', berat_produk='$berat_produk', deskripsi_produk='$deskripsi_produk' WHERE id_produk='$id'");

    if ($up == 'success') {
        echo "
        <script>alert('Berhasil Menambahkan Stok Produk ! ');</script>
        <meta http-equiv='refresh' content='0;url=index.php?page=update'>";
    } else {
        echo "<script>alert('Gagal Tambah Stok Produk ! ');</script>";
    }
}