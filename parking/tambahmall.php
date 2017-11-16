<?php
    session_start();
    error_reporting(0);
    include 'inc/koneksi.php';

  	if(!$_SESSION['login']){
  		header("location: login.php");
  	}

    if($_GET['mode'] == "edit"){
      $idMall = $_GET['id'];
      $query = "SELECT * FROM mall where id_mall=$idMall";
      $sql = mysql_query($query);
      $data = mysql_fetch_array($sql);

    
      $namaMall = $data['nama_mall'];
      $alamat = $data['alamat'];
      $slot = $data['slot_total'];
      $biaya = $data['biaya'];
      $jamBuka = $data['jam_buka'];
      $jamTutup = $data['jam_tutup'];
      $deskripsi = $data['deskripsi'];
      $formUrl = "editMall.php";
    }else{
    	
      $namaMall = "";
      $alamat = "";
      $slot = "";
      $biaya = "";
      $jamBuka = "";
      $jamTutup = "";
      $deskripsi = "";
      $formUrl = "tambahMall.php";
    }
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
				<li class="active">Lokasi</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Lokasi</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">

					<div class="panel-body">
					<form action="proses/<?php echo $formUrl;?>" method="POST">
						<div class="form-group">
							<label class="col-form-label">Nama Lokasi</label>
							<input type="text" name="nama_mall" placeholder="Nama Lokasi" class="form-control"
                value="<?php echo $namaMall;?>"/>
						</div>
						<div class="form-group" >
							<label class="col-form-label">Alamat Lokasi</label>
							<input type="text" name="alamat" placeholder="Alamat" class="form-control"
                value="<?php echo $alamat;?>"/>
						</div>
				
						<div class="form-group">
							<label class="col-form-label">Jumlah Slot Parkir</label>
							<input type="text" name="slot_total" placeholder="Slot Parkir" class="form-control"
                value="<?php echo $slot;?>"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Biaya Parkir</label>
							<input type="text" name="biaya" placeholder="Biaya" class="form-control"
                value="<?php echo $biaya;?>"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Jam Operasional</label>
							<input type="text" name="jam_buka" placeholder="Jam Buka" class="form-control"
                value="<?php echo $jamBuka;?>"/>
						</div>
						<div class="form-group">
							<input type="text" name="jam_tutup" placeholder="Jam Tutup" class="form-control"
                value="<?php echo $jamTutup;?>"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Deskripsi Lokasi</label>
							<input type="text" name="deskripsi" placeholder="Deskripsi" class="form-control"
                value="<?php echo $deskripsi;?>"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Foto Lokasi</label>
							<input type="file" name="foto" />
						</div>
            <div class="form-group">
							<input type="hidden" name="id_mall" class="form-control"
                value="<?php echo $idMall;?>"/>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
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
