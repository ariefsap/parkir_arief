<?php
    session_start();
    include 'inc/koneksi.php';

  	if(!$_SESSION['login']){
  		header("location: login.php");
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
						Table Pengguna
					</div>
					<table class="table table-striped table-bordered">
				            <thead>
				                <th>No</th>
				                <th>Nama Pengguna</th>
				                <th>Alamat</th>
				                <th>NO. HP</th>
				                <th>Username</th>
				                <th>Foto</th>
				            </thead>
				            <tbody>
				                <?php
				                    $query = "SELECT * FROM pengguna where id_jenis_pengguna = 2";
				                    $sql = mysql_query($query);

				                    if($sql){
				                        if (mysql_num_rows($sql) > 0){
				                            $no = 1;
				                            while($row = mysql_fetch_array($sql)){?>
				                               <tr>
				                                    <td><?php echo $no ?></th>
				                                    <td><?php echo $row['nama_pengguna'];?></td>
				                                    <td><?php echo $row['alamat'];?></td>
				                                    <td><?php echo $row['no_hp'];?></td>
				                                    <td><?php echo $row['username'];?></td>
				                                    <td><?php echo $row['foto'];?></td>
				                               </tr>
				                            <?php
				                                $no++;
				                            }
				                        } else {
				                            echo "tidak ada data";
				                        }
				                    }else{
				                        echo "terjadi kesalahan";
				                    }

				                    mysql_close();
				                ?>
				            </tbody>
				        </table>
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
