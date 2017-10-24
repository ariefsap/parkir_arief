<?php
    include '../inc/koneksi.php';

    $idPengguna = $_POST["id_pengguna"];
    $idMall = $_POST["id_mall"];
    $idKendaraan = $_POST["id_kendaraan"];
    $waktuBook = $_POST["waktu_book"];

    $response = new stdClass();

    if (empty($idPengguna) || empty($idMall) || empty($idKendaraan) || empty($waktuBook) ) {
        $response->status = false;
        $response->pesan = "Kolom tidak boleh kosong";
        echo json_encode($response);
    }
     else {
    $query = mysql_query("INSERT INTO booking (id_pengguna, id_mall , id_kendaraan, waktu_book)
        
                        VALUES('$idPengguna', '$idMall', '$idKendaraan', '$waktuBook')");

    if ($query){
        $response = new stdClass();
        $response->status = true;
        $response->pesan = "Pemesanan parkir anda Berhasil";
        echo json_encode($response);
    } else {
        $response = new stdClass();
        $response->status = false;
        $response->pesan = "Pemesanan parkir anda Gagal";
        echo json_encode($response);
    }

}

    mysql_close();
?>
