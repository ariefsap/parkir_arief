<?php
    session_start();
    include 'inc/koneksi.php';

  	if(!$_SESSION['login']){
  		header("location: login.php");
  	}
  	 if($_GET['mode'] == "edit"){
      $idPetugas = $_GET['id'];
      $query = "SELECT * FROM pengguna where id_pengguna = $idPetugas";
      $sql = mysql_query($query);
      $data = mysql_fetch_array($sql);

	 
	  $nama_pengguna = $data ["nama_pengguna"];
	  $alamat = $data["alamat"];
	  $no_hp = $data["no_hp"];
	  $username = $data["username"];
	  $password = $data["password"];
      $foto = $data["foto"];
      $formUrl = "editpetugas.php";
    }else{
    	
      $idPetugas = ""; 
	  $nama_pengguna = "";
	  $alamat = "";
	  $no_hp = "";
	  $username = "";
	  $password = "";
      $foto = "";
      $formUrl = "tambahpetugas.php";
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
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
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
				<li class="active">Petugas</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tambah Petugas</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">


					<div class="panel-body">
					<form action="proses/<?php echo $formUrl;?>" method="POST" enctype="multipart/form-data">

						<div class="form-group">
							<label class="col-form-label">Nama Lengkap</label>
							<input type="text" name="nama_pengguna" value="<?php echo $nama_pengguna;?>" placeholder="Nama" class="form-control"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Alamat</label>
							<input type="text" name="alamat" value="<?php echo $alamat;?>" placeholder="Alamat" class="form-control"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">No. HP</label>
							<input type="text" name="no_hp" value="<?php echo $no_hp;?>" placeholder="No. HP" class="form-control"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Username</label>
							<input type="text" name="username" value="<?php echo $username;?>" placeholder="Username" class="form-control"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="text" name="password" value="<?php echo $password;?>" placeholder="Password" class="form-control"/>
						</div>
						<div class="form-group">
							<label class="col-form-label">Foto</label>
							<input type="file" name="foto">
						</div>
						 <div class="form-group">
							<input type="hidden" name="id_petugas" class="form-control" value="<?php echo $idPetugas;?>"/>
						</div>
						<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
					</form>
				</div>
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
