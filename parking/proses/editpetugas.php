<?php
    include '../inc/koneksi.php';

    $idPetugas = $_POST["id_petugas"];
    $nama_pengguna = $_POST["nama_pengguna"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $foto = $_POST["foto"];

    if (empty($nama_pengguna) || empty($alamat) || empty($no_hp) || empty($username) || empty($password) ) {

        echo "tidak boleh kosong";
    }
        $query = mysql_query("UPDATE pengguna set nama_pengguna = '$nama_pengguna', alamat = '$alamat', no_hp = '$no_hp', username = '$username', password = '$password' where id_pengguna = '$idPetugas'");
                                

    if($query){
        header("location:../petugas.php");
    }else{
        header("location:../tambahpetugas.php?err=1");
    }

    mysql_close();
?>