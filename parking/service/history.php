<?php
    include '../inc/koneksi.php';

    $response = new stdClass();
    $tmpObj = new stdClass();
    $idBook = $_POST["id_pengguna"];

    $query = "SELECT * FROM booking where  id_pengguna = '$idBook'";
    $sql = mysql_query($query);

    if($sql){
        if (mysql_num_rows($sql) > 0){
            $tmpArr = [];
            while($row = mysql_fetch_array($sql)){
                $tmpObjLoop = new stdClass();

                $tmpObjLoop->id = $row['id_book'];
                $tmpObjLoop->nama = $row['id_pengguna'];
                $tmpObjLoop->merek = $row['id_mall'];
                $tmpObjLoop->warna = $row['id_kendaraan'];
                $tmpObjLoop->plat_no = $row['waktu_book'];


                array_push($tmpArr, $tmpObjLoop);
            }
            
            $response->status = true;
            $response->pesan = "Berhasil mengambil data";
            $response->data = $tmpArr;

            echo json_encode($response);
        } else {
            $response->status = false;
            $response->pesan = "Tidak ada history kendaraan";
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
