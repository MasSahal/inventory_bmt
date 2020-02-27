<!-- Dashboard -->
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-left-primary shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <h5 class="text-lg font-weight-bold text-primary text-uppercase mb-1">Dashboard</h5>
                        <div class="content">
                            <h3 class="my2"> BMT AL ISHLAH adalah sebuah holding activity dari USPPS BMT AL ISHLAH dan MPZ BMT AL ISHLAH </h3>

                            <p class="my-2">
                                    Kami melakukan dua aktivitas tersebut dalam satu manajemen yang kami sebut inhern. 
                                Secara umum dapat digambarkan fungsi kami adalah sebagai berikut : <br>
                                1. Islamic Micro Finance (Lembaga Keuangan Syariah berbadan hukum Koperasi) <br>
                                2. Social Enterprise (Usaha Sosial melalui upaya pemberdayaan masyarakat khususnya kepada anggota) <br>
                                3. Charity (Kegiatan Sosial dengan menerima dan menyalurkan ZISWAF bekerjasama dengan LAZ Dompet Dhuafa)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow h-100"">
    <img class=" card-img-top" src="holder.js/100x180/" alt="">
    <div class="card-body">
        <h4 class="card-title">PRESENTASE</h4>
        <div class="row mb-3">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="text-lg font-weight-bold text-primary text-uppercase mb-1">PRODUK</h5>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php
                                    $riwayat = $koneksi->query("SELECT * FROM tb_produk");
                                    $jumlah_riwayat = $riwayat->num_rows;
                                    echo $jumlah_riwayat;
                                    ?>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-moyel-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="text-lg font-weight-bold text-primary text-uppercase mb-1">LAYANAN</h5>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">100%</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-moyel-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="text-lg font-weight-bold text-primary text-uppercase mb-1">JANGKAUAN</h5>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">98 KM</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-moyel-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <h5 class="text-lg font-weight-bold text-primary text-uppercase mb-1">KOMITMEN</h5>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">100%</div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-moyel-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>