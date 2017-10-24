<?php
    include '../inc/koneksi.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    $response = new stdClass();
    $tmpObj = new stdClass();

    if (empty($username) || empty($password)) {
        $response->status = 0;
        $response->pesan = "Kolom tidak boleh kosong";
        $response->data = $tmpObj;

        echo json_encode($response);
    }

    $query = "SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
    $sql = mysql_query($query);

    if($sql){
        $row = mysql_fetch_array($sql);
        if (mysql_num_rows($sql) > 0){
            $tmpObj->username = $row['username'];

            $response->status = true;
            $response->pesan = "Berhasil login";
            $response->data = $tmpObj;

            echo json_encode($response);
        } else {
            $response->status = false;
            $response->pesan = "Username atau password salah";
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
