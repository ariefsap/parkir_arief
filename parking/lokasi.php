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
					<em class="fa fa-map-marker"></em>
				</a></li>
				<li class="active">Lokasi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Lokasi</h1>
			</div>
		</div><!--/.row-->
				
				<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
<<<<<<< HEAD
						<a href="tambahmall.php">
							<div class="btn btn-default btn"> <span class="fa fa-plus-square-o"></span> TAMBAH LOKASI</div>
						</a>	
						</div>
						<div class="panel-body">
=======
						
						<a href="tambahmall.php">
							<button class="btn btn-primary">TAMBAH LOKASI</button>
						</a>	
						
						</div>
>>>>>>> master
						<table border="1px" class="table">
				            <thead>
				                <th>No</th>
				                <th>Nama Mall</th>
				                <th>Alamat</th>
				                <th>Slot Total</th>
				                <th>Slot Terisi</th>
				                <th>Biaya</th>
				                <th>Jam Buka</th>
				                <th>Jam Tutup</th>
				                <th>Deskripsi</th>
				                <th>Aksi</th>
				            </thead>
				            <tbody>
				                <?php
				                    $query = "SELECT * FROM mall";
				                    $sql = mysql_query($query);

				                    if($sql){
				                        if (mysql_num_rows($sql) > 0){
				                            $no = 1;
				                            while($row = mysql_fetch_array($sql)){?>
				                               <tr>
				                                    <td><?php echo $no ?></th>
				                                    <td><?php echo $row['nama_mall'];?></td>
				                                    <td><?php echo $row['alamat'];?></td>
				                                    <td><?php echo $row['slot_total'];?></td>
				                                    <td><?php echo $row['slot_terisi'];?></td>
				                                    <td><?php echo $row['biaya'];?></td>
				                                    <td><?php echo $row['jam_buka'];?></td>
				                                    <td><?php echo $row['jam_tutup'];?></td>
				                                    <td><?php echo $row['deskripsi'];?></td>
<<<<<<< HEAD
				                                    <td><div class="btn btn-success btn-sm"> <span class="fa fa-pencil-square-o">
				                                    </span> Edit</div>
				                                    <div class="btn btn-danger btn-sm"> <span class="fa fa-trash">
				                                	</span>Delete</div></td>
=======
				                                    <td><div class="fa fa-pencil-square-o"></div> | <div class="fa fa-trash"></div></td>
>>>>>>> master
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
<<<<<<< HEAD
				    </div>
=======
>>>>>>> master
				</div>
			</div>
		</div><!--/.row-->

			<div class="col-sm-12">
				<p class="back-link">Parking Solution by Arief S. Adipratama</a></p>
			</div>
			</div><!-- /.col-->
			
		</div><!-- /.row -->
	</div><!--/.main-->
	
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
