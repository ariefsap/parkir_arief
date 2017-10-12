<?php
    include '../inc/koneksi.php';

    $idBook = $_POST["id_book"];


    $response = new stdClass();

    
    
    $query = mysql_query("delete from booking where id_book = '$idBook'");

    if ($query){
        $response = new stdClass();
        $response->status = true;
        $response->pesan = "Berhasil membatalkan pemesanan";
        echo json_encode($response);
    } else {
        $response = new stdClass();
        $response->status = false;
        $response->pesan = "Gagal membatalkan pemesanan";
        echo json_encode($response);
    }

    mysql_close();
?>
