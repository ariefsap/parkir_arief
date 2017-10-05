<?php
    include '../inc/koneksi.php';

    $namaPengguna = $_POST["nama_pengguna"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["password_konfirmasi"];
    $foto = "";
    $idJenisPengguna = $_POST["id_jenis_pengguna"];
    $response = new stdClass();

    if (empty($username)) {
        $response->status = false;
        $response->pesan = "Kolom username tidak boleh kosong";
        echo json_encode($response);
    } else if (empty($password)) {
        $response->status = false;
        $response->pesan = "Kolom password tidak boleh kosong";
        echo json_encode($response);
    } else if (empty($confirmPassword) || $password != $confirmPassword) {
        $response->status = false;
        $response->pesan = "Konfirmasi password tidak sama";
        echo json_encode($response);
    } else {
        if (!empty($username) && $password == $confirmPassword){
            $query = mysql_query("INSERT INTO pengguna (nama_pengguna, alamat,
                                username, password, foto, id_jenis_pengguna)
                                VALUES('$namaPengguna', '$alamat', '$username',
                                    '$password', '$foto', '$idJenisPengguna')"));

            if ($query){
                $response = new stdClass();
                $response->status = true;
                $response->pesan = "Register berhasil, silahkan login.";
                echo json_encode($response);
            } else {
                $response = new stdClass();
                $response->status = false;
                $response->pesan = "Terjadi kesalahan";
                echo json_encode($response);
            }
        }
    }

    mysql_close();
?>
