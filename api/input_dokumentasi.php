<?php

    require_once 'koneksi.php';
    
    $path = "../public/img/";
    $filename = "dokumentasi_".rand(9,999).".jpeg";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id_pertemuan = $_POST['id_pertemuan'];
        $gambar = $_POST['gambar'];
        $keterangan = $_POST['keterangan'];
        
        $res = array();
        $data = array();
        $destination = $path.$filename;

        $query = "INSERT INTO tb_dokumentasi (id_pertemuan, gambar, keterangan) VALUES ($id_pertemuan, '$filename', '$keterangan')";
        $sql = mysqli_query($con, $query);
        if($sql){
            file_put_contents($destination, base64_decode($gambar));
            $res['value'] = 1;
            $res['message'] = "Berhasil input dokumentasi";  
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal input dokumentasi"; 
        }

        echo json_encode($res);

    }

?>