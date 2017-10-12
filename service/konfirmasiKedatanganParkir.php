<?php
    include "../inc/koneksi.php";

	$idBook = $_POST['id_book'];

    $querySelect = mysql_query("SELECT * FROM booking WHERE id_book = '$idBook'");
    $response= new stdClass();
    $tmpObj = new stdClass();
    
    if(mysql_num_rows($querySelect) > 0){
        $queryUpdate = mysql_query("UPDATE booking set status = 1 WHERE id_book = '$idBook'");

    	if ($queryUpdate)	{
            $response->status = true;
            $response->pesan = "Berhasil konfirmasi";
            $response->data = $tmpObj;
    	}else{
            $response->status = false;
            $response->pesan = "kesalahan data";
            $response->data = $tmpObj;
        }
    }else{
        $response->status = false;
        $response->pesan = "Tidak ada data book";
        $response->data = $tmpObj;
    }

	echo json_encode($response);
	mysql_close($koneksi);
?>
