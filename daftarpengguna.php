<?php
    include 'inc/koneksi.php';
?>

<html>
    <head>
        <title>Daftar Pengguna</title>
    </head>
    <body>
        <table border="1px">
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
    </body>
</html>
