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
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<?php
			include "inc/menu.php";
	?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-book"></em>
				</a></li>
				<li class="active">History</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Booking</h1>
			</div>

		</div><!--/.row-->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
<<<<<<< HEAD
						<table border="1px" class="table">
					            <thead>
					                <th>No</th>
					                <th>ID Booking</th>
					                <th>Nama Pengguna</th>
					                <th>Nama Lokasi</th>
=======
					<div class="panel-heading">
						Tabel History
						
						</div>
						<table border="1px" class="table">
					            <thead>
					                <th>No</th>
					                <th>Id Booking</th>
					                <th>Pengguna</th>
					                <th>Nama MMall</th>
>>>>>>> master
					                <th>Nomor Polisi</th>
					                <th>Waktu Booking</th>
					                <th>Status</th>
					            </thead>
					            <tbody>
					                <?php
<<<<<<< HEAD
					                    $query = "SELECT * FROM booking JOIN pengguna ON booking.id_pengguna = pengguna.id_pengguna 
					                    JOIN mall ON booking.id_mall = mall.id_mall JOIN mobil_pengguna ON 
					                    booking.id_kendaraan = mobil_pengguna.id_mobil";
=======
					                    $query = "SELECT * FROM booking JOIN pengguna ON booking.id_pengguna = pengguna.id_pengguna JOIN mall ON booking.id_mall = mall.id_mall JOIN mobil_pengguna ON booking.id_kendaraan = mobil_pengguna.id_mobil";
>>>>>>> master
					                    $sql = mysql_query($query);

					                    if($sql){
					                        if (mysql_num_rows($sql) > 0){
					                            $no = 1;
					                            while($row = mysql_fetch_array($sql)){?>
					                               <tr>
					                                    <td><?php echo $no ?></th>
					                                    <td><?php echo $row['id_book'];?></td>
					                                    <td><?php echo $row['nama_pengguna'];?></td>
					                                    <td><?php echo $row['nama_mall'];?></td>
					                                    <td><?php echo $row['plat_no'];?></td>
					                                    <td><?php echo $row['waktu_book'];?></td>
					                                    <td><?php
					                                            $tmpStatus = "";
					                                            if($row['status'] == 0){
<<<<<<< HEAD
					                                                $tmpStatus = "SUKSES";
=======
					                                                $tmpStatus = "selesai";
>>>>>>> master
					                                            }else if($row['status'] == 1){
					                                                $tmpStatus = "proses";
					                                            }else{
					                                                $tmpStatus = "batal";
					                                            }
					                                            echo $tmpStatus;

					                                        ?>
					                                    </td>
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
	</div>
				
	
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
