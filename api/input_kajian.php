<?php

    require_once 'koneksi.php';

    $path = "../public/img/";
    $filename = "dokumentasi_".rand(9,999).".jpeg";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $idUser = $_POST['id_user'];
        $idJenisKajian = $_POST['id_jenis_kajian'];
        $idKategori = $_POST['id_kategori'];
        $judulKajian = $_POST['judul_kajian'];
        $pemateri = $_POST['pemateri'];
        $tanggal = $_POST['tanggal'];
        $gambar = $_POST['gambar'];
        $lokasi = $_POST['lokasi'];
        $noTelpPemateri = $_POST['no_telp_pemateri'];
        $link = $_POST['link'];
        // $status = $_POST['status'];

        $res = array();
        $destination = $path.$filename;

        $query = "INSERT INTO tb_kajian (id_jenis_kajian, id_kategori, judul_kajian, pemateri, tanggal, gambar, lokasi, link, latlng, status) VALUES ($idJenisKajian, $idKategori, '$judulKajian', '$pemateri', '$tanggal', '$filename', '$lokasi', '$link', '', 'belum publish')";
        $sql = mysqli_query($con, $query);
        if($sql){
            file_put_contents($destination, base64_decode($gambar));
            $idKajian = mysqli_insert_id($con);
            $queryUsulan = "INSERT INTO tb_usulan (id_user, id_kajian, no_telp_pemateri, status) VALUES ($idUser, $idKajian, '$noTelpPemateri', 'sedang proses')";
            $sqlUsulan = mysqli_query($con, $queryUsulan);
            if($sqlUsulan){
                $idUsulan = mysqli_insert_id($con);
                $res['value'] = 1;
                $res['message'] = "Berhasil Menginput Usulan";
                $res['id_usulan'] = $idUsulan;
            }else{
                $res['value'] = 0;
                $res['message'] = "Gagal Menginput usulan";
            }
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal Menginput Kajian";
        }

        echo json_encode($res);

    }

?>