<?php
    include '../inc/koneksi.php';

    $nama_pengguna = $_POST["nama_pengguna"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $foto = $_FILES['foto']['name'];

    if (strlen($foto)>0) {
        if(is_uploaded_file($_FILES['foto']['tmp_name'])){
            move_uploaded_file($_FILES['foto']['tmp_name'],"../upload_foto/foto_pengguna/".$foto);
        }
        # code...
    }

    if (empty($nama_pengguna) || empty($alamat) || empty($no_hp) || empty($username) || empty($password) ||
        empty($foto)) {

        echo "tidak boleh kosong";
    }
        $query = mysql_query("INSERT INTO pengguna (nama_pengguna, alamat , no_hp, username, password,foto, id_jenis_pengguna)
                                VALUES('$nama_pengguna', '$alamat', '$no_hp', '$username', '$password','$foto', 3)");

    if($query){
        header("location:../petugas.php");
    }else{
        header("location:../tambahpetugas.php?err=1");
    }

    mysql_close();
?>

