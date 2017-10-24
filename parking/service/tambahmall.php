<?php
    include '../inc/koneksi.php';

    $nama_mall = $_POST["nama_mall"];
    $alamat = $_POST["alamat"];
    $slot_total = $_POST["slot_total"];
    $slot_terisi = $_POST["slot_terisi"];
    $biaya = $_POST["biaya"];
    $jam_buka = $_POST["jam_buka"];
    $jam_tutup = $_POST["jam_tutup"];
    $deskripsi = $_POST["deskripsi"];
    $url = $_POST["url"];

    $response = new stdClass();

    if ( empty($nama_mall) || empty($alamat) || empty($slot_total) || empty($slot_terisi) ||
        empty($biaya) || empty($jam_buka) || empty($jam_tutup) || empty($jam_tutup) || empty($deskripsi) || 
        empty($url) ) {

        $response->status = false;
        $response->pesan = "Kolom tidak boleh kosong";
        echo json_encode($response);
    }
     else {
    $query = mysql_query("INSERT INTO mall (nama_mall , alamat, slot_total, slot_terisi, biaya,
                                        jam_buka, jam_tutup, deskripsi, url)
        
                        VALUES('$nama_mall', '$alamat', '$slot_total', '$slot_terisi', '$biaya',
                                '$jam_buka', '$jam_tutup', '$deskripsi', '$url')");

    if ($query){
        $response = new stdClass();
        $response->status = true;
        $response->pesan = "Berhasil Tambah Mall";
        echo json_encode($response);
    } else {
        $response = new stdClass();
        $response->status = false;
        $response->pesan = "Gagal Tambah Mall";
        echo json_encode($response);
    }

}

    mysql_close();
?>
