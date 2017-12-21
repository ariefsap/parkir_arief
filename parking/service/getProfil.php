<?php
    include '../inc/koneksi.php';

    $idPengguna = $_POST["id_pengguna"];
    $response = new stdClass();
    $tmpObj = new stdClass();

    if (empty($idPengguna)) {
        $response->status = 0;
        $response->pesan = "kesalahan data";
        $response->data = $tmpObj;

        echo json_encode($response);
    }

    $query = "SELECT * FROM pengguna JOIN jenis_pengguna
                ON pengguna.id_jenis_pengguna = jenis_pengguna.id_jenis_pengguna
                WHERE pengguna.id_pengguna='$idPengguna'";
    $sql = mysql_query($query);

    if($sql){
        $row = mysql_fetch_array($sql);
        if (mysql_num_rows($sql) > 0){
            $tmpObj->nama = $row['nama_pengguna'];
            $tmpObj->username = $row['username'];
            $tmpObj->alamat = $row['alamat'];
            $tmpObj->foto = $row['foto'];
            $tmpObj->jenis_pengguna = $row['nama_jenis_pengguna'];
            $tmpObj->no_hp = $row['no_hp'];
            $tmpObj->url = $row['foto'];

            $response->status = true;
            $response->pesan = "Berhasil login";
            $response->data = $tmpObj;

            echo json_encode($response);
        } else {
            $response->status = false;
            $response->pesan = "Tidak ada pengguna dalam database";
            $response->data = $tmpObj;
            echo json_encode($response);
        }
    }else{
        $response->status = false;
        $response->pesan = "Terjadi kesalahan";
        $response->data = $tmpObj;
        echo json_encode($response);
    }

    mysql_close();
?>
