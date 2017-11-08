<?php
    include '../inc/koneksi.php';

    $idMall = $_POST["id_mall"];
    $nama_mall = $_POST["nama_mall"];
    $alamat = $_POST["alamat"];
    $slot_total = $_POST["slot_total"];
    $biaya = $_POST["biaya"];
    $jam_buka = $_POST["jam_buka"];
    $jam_tutup = $_POST["jam_tutup"];
    $deskripsi = $_POST["deskripsi"];
    $url = $_POST["url"];

    if (empty($nama_mall) || empty($alamat) || empty($slot_total) || empty($biaya) ||
        empty($jam_buka) || empty($jam_tutup) || empty($deskripsi)) {

        echo "tidak boleh kosong";
    }
        $query = mysql_query("UPDATE mall SET nama_mall = '$nama_mall', alamat = '$alamat',
                      slot_total = '$slot_total', biaya = '$biaya', jam_buka = '$jam_buka',
                       jam_tutup = '$jam_tutup', deskripsi = '$deskripsi', url = '$url' WHERE id_mall = '$idMall'")
                       or die(mysql_error());

    if($query){
         header("location:../lokasi.php");
    }else{
        header("location:../tambahmall.php?err=1");
    }

    mysql_close();
?>
