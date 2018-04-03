<?php
    include '../inc/koneksi.php';
    error_reporting(0);

    $namaPengguna = $_POST["nama_pengguna"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["password_konfirmasi"];
    $foto = "";
    $idJenisPengguna = $_POST["id_jenis_pengguna"];
    $hp = $_POST["no_hp"];
    $alamat = $_POST["alamat"];
    $merk = $_POST["merk"];
    $warna = $_POST["warna"];
    $plat = $_POST["plat_no"];
    $response = new stdClass();

    if (empty($username)) {
        $response->status = false;
        $response->pesan = "Kolom username tidak boleh kosong";
        $response->data = new stdClass();
    } else if (empty($password)) {
        $response->status = false;
        $response->pesan = "Kolom password tidak boleh kosong";
        $response->data = new stdClass();
    }else if (empty($hp)) {
        $response->status = false;
        $response->pesan = "Kolom nomor hp tidak boleh kosong";
        $response->data = new stdClass();
    }else if (empty($alamat)) {
        $response->status = false;
        $response->pesan = "Kolom alamat tidak boleh kosong";
        $response->data = new stdClass();
    } else if (empty($merk)) {
        $response->status = false;
        $response->pesan = "Kolom merk tidak boleh kosong";
        $response->data = new stdClass();
    }else if (empty($warna)) {
        $response->status = false;
        $response->pesan = "Kolom warna tidak boleh kosong";
        $response->data = new stdClass();
    }else if (empty($plat)) {
        $response->status = false;
        $response->pesan = "Kolom plat nomor tidak boleh kosong";
        $response->data = new stdClass();
    }else if (empty($confirmPassword) || $password != $confirmPassword) {
        $response->status = false;
        $response->pesan = "Konfirmasi password tidak sama";
        $response->data = new stdClass();
    } else {
        // if (!empty($username) && ($password == $confirmPassword))
            $query = mysql_query("INSERT INTO pengguna (nama_pengguna, alamat,
                                username, password, foto, id_jenis_pengguna, no_hp)
                                VALUES('$namaPengguna', '$alamat', '$username',
                                    '$password', '$foto', '$idJenisPengguna', '$hp')");

            if ($query){
                // $queryId=mysql_insert_id();
                $queryId = mysql_query("SELECT MAX(id_pengguna) FROM pengguna");
                $tmp = mysql_fetch_array($queryId);
                $idPengguna = $tmp[0];
                
                $queryKendaraan = mysql_query("INSERT INTO mobil_pengguna (id_pengguna, merek,
                                    warna, plat_no)
                                    VALUES('$idPengguna', '$merk', '$warna',
                                        '$plat')");


                $response = new stdClass();
                $response->status = true;
                $response->pesan = "Register berhasil, silahkan login.";
                $response->data = new stdClass();
            } else {
                $response = new stdClass();
                $response->status = false;
                $response->pesan = "Terjadi kesalahan";
                $response->data = new stdClass();
            }
        
    }
    echo json_encode($response);

    mysql_close();
?>
