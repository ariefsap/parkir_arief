<?php
    include '../inc/koneksi.php';

    $nama_pengguna = $_POST["nama_pengguna"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $foto = $_POST["foto"];

    if (empty($nama_pengguna) || empty($alamat) || empty($no_hp) || empty($username) || empty($password) ||
        empty($foto) ) {

        echo "tidak boleh kosong";
    }
        $query = mysql_query("INSERT INTO pengguna (nama_pengguna, alamat , no_hp, username, password, id_jenis_pengguna)
                                VALUES('$nama_pengguna', '$alamat', '$no_hp', '$username', '$password', 3)") or die(mysql_error());

    if($query){
        echo "berhasil tambah petugas"; 
    }else{
        echo "gagal tambah petugas";
    }

    mysql_close();
?>
