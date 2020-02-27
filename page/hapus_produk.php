<?php 
$id = $_GET['kode'];
$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id'");
$data = $ambil->fetch_assoc();

//Hapus Foto
$foto_produk = $data['foto_produk'];
if (file_exists("../foto_produk/$foto_produk")) {
    unlink("foto_produk/$foto_produk");
}
//hapus produk
$koneksi->query("DELETE FROM tb_produk WHERE id_produk='$id'");
echo"<script>alert('Produk Dihapus ! ');</script>";
echo"<script>location='index.php?page=update';</script>";