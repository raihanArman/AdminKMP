<?php

    require_once 'koneksi.php';

    $path = "../public/img/lampiran/";
    $filename = "lampiran_".rand(9,999).".jpeg";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idUsulan = $_POST['id_usulan'];
        $keterangan = $_POST['keterangan'];
        $gambar = $_POST['gambar'];

        $res = array();

        $destination = $path.$filename;

        $query = "INSERT INTO tb_lampiran (id_usulan, keterangan, gambar) VALUES ($idUsulan, '$keterangan', '$filename')";
        if(mysqli_query($con, $query)){
            file_put_contents($destination, base64_decode($gambar));
            $res['value'] = 1;
            $res['message'] = "Berhasil Menginput Lampiran ";
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal Menginput Lampiran";
        }

    }

?>