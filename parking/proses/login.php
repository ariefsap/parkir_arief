<?php
    session_start();
    include '../inc/koneksi.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($username) || empty($password)) {

        echo "tidak boleh kosong";
    }

    $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";

    $sql = mysql_query($query);
    if($sql){
        $row = mysql_fetch_array($sql);
        if (mysql_num_rows($sql) > 0){
            $_SESSION['login'] = true;
            header("location:../index.php");
        } else {
            header("location:../login.php?err=1");
        }
    }else{
        echo "terjadi kesalahan";
    }

    mysql_close();
?>
