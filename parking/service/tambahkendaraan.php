<?php
    include '../inc/koneksi.php';

    $idPengguna = $_POST["id_pengguna"];
    $merek = $_POST["merek"];
    $warna = $_POST["warna"];
    $platNo = $_POST["plat_no"];

    $response = new stdClass();

    if (empty($idPengguna) || empty($merek) || empty($warna) || empty($platNo) ) {
        $response->status = false;
        $response->pesan = "Kolom tidak boleh kosong";
        echo json_encode($response);
    }
     else {
    $query = mysql_query("INSERT INTO mobil_pengguna(id_pengguna, merek , warna, plat_no)
        
                        VALUES('$idPengguna', '$merek', '$warna', '$platNo')");

    if ($query){
        $response = new stdClass();
        $response->status = true;
        $response->pesan = "Berhasil Tambah Kendaraan";
        echo json_encode($response);
    } else {
        $response = new stdClass();
        $response->status = false;
        $response->pesan = "Gagal Tambah Kendaraan";
        echo json_encode($response);
    }

}

    mysql_close();
?>
