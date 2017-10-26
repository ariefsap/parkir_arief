<?php
    include '../inc/koneksi.php';

    $id_pengguna = $_POST["id_pengguna"];

        $query = mysql_query("DELETE pengguna where id_pengguna = $idPengguna");

    if($query){
         header("location:../petugas.php");
    }else{
        header("location:../petugas.php?err=1");
    }

    mysql_close();
?>
