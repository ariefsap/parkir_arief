<?php
    include '../parking/inc/koneksi.php';
?>

<html>
    <head>
        <title>All Mall</title>
    </head>
    <body>
        <table border="1px">
            <thead>
                <th>No</th>
                <th>Nama Mall</th>
                <th>Alamat</th>
                <th>Slot Total</th>
                <th>Slot Terisi</th>
                <th>Biaya</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
                <th>Deslripsi</th>
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
