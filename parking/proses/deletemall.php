<?php
    include '../inc/koneksi.php';

    $id_mall = $_GET["id_mall"];

        $query = mysql_query("DELETE from mall where id_mall = '$id_mall'");

    if($query){
         header("location:../lokasi.php");
    }else{
        header("location:../lokasi.php?err=1");
    }

   mysql_close();
?>
