<?php
    include '../inc/koneksi.php';
    error_reporting(0);

    $namaPengguna = $_POST["nama_pengguna"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["password_konfirmasi"];
    $foto = "";
    $idJenisPengguna = $_POST["id_jenis_pengguna"];
    $alamat = $_POST["alamat"];
    $response = new stdClass();

    if (empty($username)) {
        $response->status = false;
        $response->pesan = "Kolom username tidak boleh kosong";
        $response->data = new stdClass();
    } else if (empty($password)) {
        $response->status = false;
        $response->pesan = "Kolom password tidak boleh kosong";
        $response->data = new stdClass();
    } else if (empty($confirmPassword) || $password != $confirmPassword) {
        $response->status = false;
        $response->pesan = "Konfirmasi password tidak sama";
        $response->data = new stdClass();
    } else {
        if (!empty($username) && ($password == $confirmPassword) && !empty($alamat)){
            $query = mysql_query("INSERT INTO pengguna (nama_pengguna, alamat,
                                username, password, foto, id_jenis_pengguna)
                                VALUES('$namaPengguna', '$alamat', '$username',
                                    '$password', '$foto', '$idJenisPengguna')");

            if ($query){
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
    }
    echo json_encode($response);

    mysql_close();
?>
