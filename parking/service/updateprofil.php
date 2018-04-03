<?php
    error_reporting(0);
    include "../inc/koneksi.php";

	$idPengguna = $_POST['id_pengguna'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $noHp = $_POST['no_hp'];
    $currTime = date("Y_m_d_h_i_sa");
    $url = $_FILES["foto"]["name"];
    $namaGambar = $currTime . $url;

    function upload (){
        global $namaGambar;

        $target_dir = "/../upload_foto/foto_pengguna/";
        $target_file = realpath(dirname(__FILE__)) . $target_dir . $namaGambar;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $url = $_FILES["foto"]["name"];
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["foto"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["foto"]["size"] > 500000) {
            // echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            // $uploadOk = 0;
        // }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            return false;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                return true;
                // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                // echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }

    }

    $response= new stdClass();
    $tmpObj = new stdClass();

    // $queryUpdate = mysql_query("UPDATE pengguna set nama_pengguna = '$nama_pengguna', alamat = '$alamat',
    //                             username = '$username', password = '$password', no_hp = '$noHp'
    //                             WHERE  id_pengguna = '$idPengguna'");

    if (upload())	{
        $queryUpdate= mysql_query("UPDATE pengguna set nama_pengguna = '$nama_pengguna', alamat = '$alamat',
                                username = '$username', password = '$password', no_hp = '$noHp',foto='$namaGambar'
                                WHERE  id_pengguna = '$idPengguna'");
        if($queryUpdate){
        $response->status = true;
        $response->pesan = "Berhasil Update";
        $response->data = $tmpObj;
    }else{
        $response->status = false;
        $response->pesan = "Update Gagal";
        $response->data = $tmpObj;
    }
}
	echo json_encode($response);
	mysql_close($koneksi);
?>
