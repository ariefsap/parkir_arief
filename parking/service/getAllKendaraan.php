<?php
    include '../inc/koneksi.php';

    $response = new stdClass();
    $tmpObj = new stdClass();
    $idPengguna = $_POST["id_pengguna"];

    $query = "SELECT * FROM mobil_pengguna where  id_pengguna = '$idPengguna'";
    $sql = mysql_query($query);

    if($sql){
        if (mysql_num_rows($sql) > 0){
            $tmpArr = [];
            while($row = mysql_fetch_array($sql)){
                $tmpObjLoop = new stdClass();

                $tmpObjLoop->id = $row['id_mobil'];
                $tmpObjLoop->nama = $row['id_pengguna'];
                $tmpObjLoop->merek = $row['merek'];
                $tmpObjLoop->warna = $row['warna'];
                $tmpObjLoop->plat_no = $row['plat_no'];


                array_push($tmpArr, $tmpObjLoop);
            }
            
            $response->status = true;
            $response->pesan = "Berhasil mengambil data";
            $response->data = $tmpArr;

            echo json_encode($response);
        } else {
            $response->status = false;
            $response->pesan = "Tidak ada data kendaraan";
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
