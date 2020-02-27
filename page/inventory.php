<!-- Inventory -->
<div class="row">
    <div class="container-fluid">
        <div class="card p-4 shadow h-100">
            <div class="row">
                <?php

                $isi = $koneksi->query("SELECT * FROM tb_produk WHERE qty_produk!='0'");
                while ($data = $isi->fetch_assoc()) {
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                        <div class="card p-2 mb-4">
                            <img src="foto_produk/<?= $data['foto_produk']; ?>" class="img-responsive img-thumbnail" alt="">
                            <div class="caption">
                                <h4 class="text-primary"><?= $data['nama_produk']; ?></h4>
                                <div class="mt-3">
                                    <span class="float-right">Stok : <?= $data['qty_produk']; ?></span>
                                    <h5 class="text-dark">Rp. <?= number_format($data['harga_produk']); ?></h5>
                                </div>
                                <form method="post">    
                                    <div class="form-group my-4">
                                        <label for="qty">Qty</label>
                                        <input type="hidden" name="id" value="<?= $data['id_produk']; ?>">
                                        <input type="number" min="1" max="<?=$data['qty_produk'];?>" name="qty" id="qty" class="form-control bg-light" required placeholder="masukan jumlah" aria-describedby="helpId">
                                    </div>
                                    <button type="submit" name="beli" class="btn btn-primary text-light"><i class="fa fa-cart-plus"></i> Beli</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }

                $produk_kosong = $koneksi->query("SELECT * FROM tb_produk WHERE qty_produk='0'");
                while ($data = $produk_kosong->fetch_assoc()) {
                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-2">
                        <div class="card p-2 mb-4">
                            <img src="foto_produk/<?= $data['foto_produk']; ?>"class="img-responsive img-thumbnail" alt="">
                            <div class="caption">
                            <h4 class="text-danger"><?= $data['nama_produk']; ?></h4>
                                <div class="mt-3">
                                    <span class="float-right">Stok : <?= $data['qty_produk']; ?></span>
                                    <h5 class="text-dark"><strike>Rp. <?= number_format($data['harga_produk']); ?></strike></h5>
                                </div>
                                <form method="post">
                                    <div class="form-group my-4">
                                        <label for="qty">Qty</label>
                                        <input type="hidden" name="id" value="<?= $data['id_produk']; ?>">
                                        <input type="text" name="qty" id="qty" class="form-control bg-light disabled" readonly placeholder="Jumlah" aria-describedby="helpId">
                                    </div>
                                    <button type="button" name="beli" onclick="return alert('Maaf, Stok Kosong')" class="btn btn-secondary text-light disabled" readonly><i class="fa fa-cart-plus"></i> Beli</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['beli'])) {

    $id = $_POST['id'];
    $qty = $_POST['qty'];

    //pilih produk yg di beli
    $produk = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id'");
    $data = $produk->fetch_assoc();

    if ($qty > $data['qty_produk']) {
        echo "<script>alert('Jumlah Melebihi Stok !');</script>";
    }elseif($qty <= $data['qty_produk']) {
        //kurangi stok produk dengan stok yg kita beli
        $stok_setelah_beli = $data['qty_produk'] - $qty;
        $beli = $koneksi->query("UPDATE tb_produk SET qty_produk='$stok_setelah_beli' WHERE id_produk='$id'");
    
    
        //masukan data ke rwayat
        $id_produk = $data['id_produk'];
        $nama_produk = $data['nama_produk'];
        $tgl = date('Y-m-d H:i:s');
    
        $riwayat = $koneksi->query("INSERT INTO tb_riwayat_produk (id_produk, nama_produk, qty_produk, status_produk, tanggal, keterangan) VALUES ('$id_produk','$nama_produk','$qty','Keluar','$tgl','Dibeli')");
        if ($riwayat) {
            echo "<script>alert('Pembelian Berhasil!');</script>";
            echo "<meta http-equiv='refresh' content='0;url=index.php?page=inventory'>";
        } else {
            echo "<script>alert('Pembelian Gagal !');</script>";
        }
    }
}
