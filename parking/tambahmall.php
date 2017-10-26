<?php
    include 'inc/koneksi.php';
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Parking Solution</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Parking</span>Solution</a>
		</div><!-- /.container-fluid -->



	</nav>
	<?php
			include "inc/menu.php";
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-user"></em>
				</a></li>
				<li class="active">Pengguna</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Pengguna</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Form Tambah Mall
					</div>
					<form action="proses/tambahmall.php" method="POST">
						<div class="form-group">
								<input type="text" name="nama_mall" placeholder="nama_mall" class="form-control"/>
						</div>
						<div class="form-group" >
							<input type="text" name="alamat" placeholder="alamat" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="slot_total" placeholder="slot_total" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="slot_terisi" placeholder="slot_terisi" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="biaya" placeholder="biaya" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="jam_buka" placeholder="jam_buka" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="jam_tutup" placeholder="jam_tutup" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="deskripsi" placeholder="deskripsi" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="text" name="url" placeholder="url" class="form-control"/>
						</div>

						<button type="submit" class="btn btn-primary">Tambah</button>
					</form>
				</div>
			</div>
		</div><!--/.row-->
			<div class="col-sm-12">
				<p class="back-link">Parking Solution by Arief S. Adipratama</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	  

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	
</body>
</html>