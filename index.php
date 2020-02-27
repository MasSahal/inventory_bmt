<?php
$koneksi = new mysqli('localhost','root','','db_inventory');
?>
<!doctype html>
<html lang="en">

<head>
	<title>Inventory - BMT AL ISHLAH</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link rel="icon" type="image/png" href="favicon.png">
</head>

<body><ion-icon name="pricetags"></ion-icon>

	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar">
			<div class="custom-menu">
				<button type="button" id="sidebarCollapse" class="btn btn-primary">
					<i class="fa fa-bars"></i>
					<span class="sr-only">Menu</span>
				</button>
			</div>
			<div class="p-4">
				<h1><a href="?page=dashboard" class="logo">BMT <span>Al Ishlah</span></a></h1>
				<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="?page=dashboard"><i class="fa fa-home mr-3"></i><span>Dashboard</span></a>
					</li>
					<li>
						<a href="?page=update"><i class="fa fa-archive mr-3"></i><span>Update Stok</span></a>
					</li>
					<li>
						<a href="?page=inventory"><i class="fa fa-tags mr-3"></i><span>Produk</span></a>
					</li>
					<li>
						<a href="?page=riwayat"><i class="fa fa-briefcase mr-3"></i><span>Riwayat</span></a>
					</li>
					<li>
						<a href="?page=about"><i class="fa fa-user mr-3"></i><span> About</span></a>
					</li>
				</ul>

				<div class="mb-5">
					<h3 class="h6 mb-3">Subscribe for update</h3>
					<form action="#" class="subscribe-form">
						<div class="form-group d-flex">
							<div class="icon"><span class="icon-paper-plane"></span></div>
							<input type="text" class="form-control" placeholder="Enter Email Address">
						</div>
					</form>
				</div>
				<div class="footer">
					<p>Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script><i class="icon-heart" aria-hidden="true"></i></p>
				</div>
				<!--bawah Document.write Tempt copyriht -->
			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-2">


			<div class="container-fluid">
				<header>
					<?php include('layouts/header.php'); ?>
				</header>
				<?php

				//jika ada yang di klik menu maka
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = 'dashboard';
				}

				switch ($page) {
						//jika case page=dashboard maka akan tampil halaman dashboard
					case 'dashboard':
						include('page/dashboard.php');
						break;
					case 'inventory':
						include('page/inventory.php');
						break;
					case 'riwayat':
						include('page/riwayat.php');
						break;
					case 'about':
						include('page/about.php');
						break;
					case 'update':
							include('page/update.php');
							break;
					case 'add_produk':
							include('page/add_produk.php');
							break;
					case 'edit_produk':
							include('page/edit_produk.php');
							break;
					case 'hapus_produk':
							include('page/hapus_produk.php');
							break;
					case 'update_stok':
							include('page/update_stok.php');
							break;
					case 'cetak':
							include('page/cetak.php');
							break;

						//jika memasukan case selain diatas maka kembali ke default
					default:
						include('page/dashboard.php');
						break;
				}
				?>
			</div>
		</div>
	</div>



	<!-- ini buat javascript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script>
	$(document).ready(function() {
		$('#table').DataTable();
	} );
	</script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>