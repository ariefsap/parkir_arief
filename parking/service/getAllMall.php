<?php
    include '../inc/koneksi.php';

    $response = new stdClass();
    $tmpObj = new stdClass();

    $query = "SELECT * FROM mall";
    $sql = mysql_query($query);

    if($sql){
        if (mysql_num_rows($sql) > 0){
            $tmpArr = [];
            while($row = mysql_fetch_array($sql)){
                $tmpObjLoop = new stdClass();

                $tmpObjLoop->id = $row['id_mall'];
                $tmpObjLoop->nama = $row['nama_mall'];
                $tmpObjLoop->alamat = $row['alamat'];
                $tmpObjLoop->slot_total = $row['slot_total'];
                $tmpObjLoop->slot_terisi = $row['slot_terisi'];
                $tmpObjLoop->biaya = $row['biaya'];
                $tmpObjLoop->jam_buka = $row['jam_buka'];
                $tmpObjLoop->jam_tutup = $row['jam_tutup'];
                $tmpObjLoop->deskripsi = $row['deskripsi'];
                $tmpObjLoop->url = $row['url'];

                array_push($tmpArr, $tmpObjLoop);
            }

            $response->status = true;
            $response->pesan = "Berhasil mengambil data";
            $response->data = $tmpArr;

            echo json_encode($response);
        } else {
            $response->status = false;
            $response->pesan = "Tidak ada data mall";
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
