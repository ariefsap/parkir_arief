<?php
    include "../inc/koneksi.php";

	$idPengguna = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $response= new stdClass();
    $tmpObj = new stdClass();
    
    
    $queryUpdate = mysql_query("UPDATE pengguna set nama_pengguna = '$nama_pengguna', alamat = '$alamat', 
                                username = '$username', password = '$password' WHERE  id_pengguna = '$idPengguna'");

    if ($queryUpdate)	{
        $response->status = true;
        $response->pesan = "Berhasil Update";
        $response->data = $tmpObj;
    }else{
        $response->status = false;
        $response->pesan = "Update Gagal";
        $response->data = $tmpObj;  
    }

	echo json_encode($response);
	mysql_close($koneksi);
?>
