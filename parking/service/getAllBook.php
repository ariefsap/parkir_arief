<?php
    include '../inc/koneksi.php';

    $response = new stdClass();
    $tmpObj = new stdClass();

    $query = "SELECT p.nama_pengguna, m.nama_mall, b.id_book, mb.merek, mb.warna, mb.plat_no, b.waktu_book
                FROM booking b JOIN pengguna p ON b.id_pengguna = p.id_pengguna
                JOIN mall m ON b.id_mall = m.id_mall
                JOIN mobil_pengguna mb ON mb.id_mobil = b.id_kendaraan
                WHERE  b.status = '1'";
    $sql = mysql_query($query) or dir(mysql_error());

    if($sql){
        if (mysql_num_rows($sql) > 0){
            $tmpArr = [];
            while($row = mysql_fetch_object($sql)){
                array_push($tmpArr, $row);
            }

            $tmpObj->list = $tmpArr;

            $response->status = true;
            $response->pesan = "Berhasil mengambil data";
            $response->data = $tmpObj;
        } else {
            $response->status = false;
            $response->pesan = "Belum ada data booking";
            $response->data = $tmpObj;
        }
    }else{
        $response->status = false;
        $response->pesan = "Terjadi kesalahan";
        $response->data = $tmpObj;
    }

    echo json_encode($response);
    mysql_close();
?>
