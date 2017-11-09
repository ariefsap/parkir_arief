<?php
    include '../inc/koneksi.php';

    $idPengguna = $_POST["id_pengguna"];

        $query = mysql_query("DELETE from pengguna where id_pengguna = '$idPengguna'");

    if($query){
         header("location:../pengguna.php");
    }else{
        header("location:../pengguna.php?err=1");
    }

    mysql_close();
?>
