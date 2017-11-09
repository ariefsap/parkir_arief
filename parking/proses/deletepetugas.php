<?php
    include '../inc/koneksi.php';

    $idPengguna = $_GET["id_petugas"];

    $query = mysql_query("DELETE FROM pengguna where id_pengguna = '$idPengguna'");

    if($query){
         header("location:../petugas.php");
    }else{
        header("location:../petugas.php?err=1");
    }

    mysql_close();
?>
