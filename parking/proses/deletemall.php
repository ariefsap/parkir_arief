<?php
    include '../inc/koneksi.php';

    $id_mall = $_POST["id_mall"];

        $query = mysql_query("DELETE from mall where id_mall = $id_mall");

    if($query){
         header("location:../mall.php");
    }else{
        header("location:../mall.php?err=1");
    }

    mysql_close();
?>
