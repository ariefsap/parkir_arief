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
    $url = $_FILES['url']['name'];

    if (strlen($url)>0) {
        if(is_uploaded_file($_FILES['url']['tmp_name'])){
            move_uploaded_file($_FILES['url']['tmp_name'], "../upload_foto/".$url);
        }
        # code...
    }

    if (empty($nama_mall) || empty($alamat) || empty($slot_total) || empty($slot_terisi) || empty($biaya) ||
        empty($jam_buka) || empty($jam_tutup) || empty($deskripsi) || empty($url)) {

        echo "tidak boleh kosong";
    }
        $query = mysql_query("INSERT INTO mall (nama_mall, alamat , slot_total, slot_terisi, biaya, jam_buka, jam_tutup, 
                                        deskripsi, url)
                                VALUES('$nama_mall', '$alamat', '$slot_total', '$slot_terisi', '$biaya', '$jam_buka', '$jam_tutup', 
                                        '$deskripsi', '$url')") or die(mysql_error());

    if($query){
         header("location:../lokasi.php");
    }else{
        header("location:../tambahmall.php?err=1");
    }

    mysql_close();
?>
