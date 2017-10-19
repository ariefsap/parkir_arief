<?php
    include 'inc/koneksi.php';
?>

<html>
    <head>
        <title>Daftar Booking</title>
    </head>
    <body>
        <table border="1px">
            <thead>
                <th>No</th>
                <th>Id Booking</th>
                <th>Pengguna</th>
                <th>Nama MMall</th>
                <th>Nomor Polisi</th>
                <th>Waktu Booking</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM booking JOIN pengguna ON booking.id_pengguna = pengguna.id_pengguna JOIN mall ON booking.id_mall = mall.id_mall JOIN mobil_pengguna ON booking.id_kendaraan = mobil_pengguna.id_mobil";
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
                                                $tmpStatus = "selesai";
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
    </body>
</html>
