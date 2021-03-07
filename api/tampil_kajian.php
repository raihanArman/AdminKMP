<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $id_kajian = isset($_GET['id_kajian']) ? $_GET['id_kajian'] : false;
        $tanggal1 = isset($_GET['tanggal_1']) ? $_GET['tanggal_1'] : false;
        $tanggal2 = isset($_GET['tanggal_2']) ? $_GET['tanggal_2'] : false;
        $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;
        $cari = isset($_GET['cari']) ? $_GET['cari'] : false;

        $res = array();

        if($tanggal1 == null && $tanggal2 == null && $id_kajian == null && $id_kategori == null && $cari == null){
            $query = "SELECT * FROM tb_kajian  WHERE status = 'publish' ORDER BY tanggal DESC";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_kajian" => $row['id_kajian'],
                        "id_kategori" => $row['id_kategori'],
                        "id_jenis_kajian" => $row['id_jenis_kajian'],
                        "judul_kajian" => $row['judul_kajian'],
                        "pemateri" => $row['pemateri'],
                        "tanggal" => $row['tanggal'],
                        "tanggal_upload" => $row['tanggal_upload'],
                        "gambar" => $row['gambar'],
                        "lokasi" => $row['lokasi'],
                        "latlng" => $row['latlng'],
                        "link" => $row['link']
                    ));
                }
            }
        }elseif($tanggal1 != null && $tanggal2 != null && $id_kajian == null && $id_kategori == null && $cari == null){
            $query = "SELECT * FROM tb_kajian  WHERE status = 'publish' AND tanggal BETWEEN '$tanggal1' AND '$tanggal2' ORDER BY tanggal DESC";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_kajian" => $row['id_kajian'],
                        "id_kategori" => $row['id_kategori'],
                        "id_jenis_kajian" => $row['id_jenis_kajian'],
                        "judul_kajian" => $row['judul_kajian'],
                        "pemateri" => $row['pemateri'],
                        "tanggal" => $row['tanggal'],
                        "tanggal_upload" => $row['tanggal_upload'],
                        "gambar" => $row['gambar'],
                        "lokasi" => $row['lokasi'],
                        "latlng" => $row['latlng'],
                        "link" => $row['link']
                    ));
                }
            }
        }elseif($tanggal1 == null && $tanggal2 == null && $id_kajian != null && $id_kategori == null && $cari == null){
            $query = "SELECT * FROM tb_kajian  WHERE id_kajian = $id_kajian";
            $sql = mysqli_query($con, $query);
            if($sql){
                $row = mysqli_fetch_array($sql);
                $res['id_kajian'] = $row['id_kajian'];
                $res['id_kategori'] = $row['id_kategori'];
                $res['id_jenis_kajian'] = $row['id_jenis_kajian'];
                $res['judul_kajian'] = $row['judul_kajian'];
                $res['pemateri'] = $row['pemateri'];
                $res['tanggal'] = $row['tanggal'];
                $res['tanggal_upload'] = $row['tanggal_upload'];
                $res['gambar'] = $row['gambar'];
                $res['lokasi'] = $row['lokasi'];
                $res['latlng'] = $row['latlng'];
                $res['link'] = $row['link'];
            }
        }elseif($tanggal1 != null && $tanggal2 != null && $id_kajian == null && $id_kategori != null && $cari == null){
            $query = "SELECT * FROM tb_kajian  WHERE status = 'publish' AND id_kategori = $id_kategori AND tanggal BETWEEN '$tanggal1' AND '$tanggal2' ORDER BY tanggal DESC";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_kajian" => $row['id_kajian'],
                        "id_kategori" => $row['id_kategori'],
                        "id_jenis_kajian" => $row['id_jenis_kajian'],
                        "judul_kajian" => $row['judul_kajian'],
                        "pemateri" => $row['pemateri'],
                        "tanggal" => $row['tanggal'],
                        "tanggal_upload" => $row['tanggal_upload'],
                        "gambar" => $row['gambar'],
                        "lokasi" => $row['lokasi'],
                        "latlng" => $row['latlng'],
                        "link" => $row['link']
                    ));
                }
            }
        }elseif($tanggal1 == null && $tanggal2 == null && $id_kajian == null && $id_kategori != null && $cari == null){
            $query = "SELECT * FROM tb_kajian  WHERE status = 'publish' AND id_kategori = $id_kategori ORDER BY tanggal DESC";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_kajian" => $row['id_kajian'],
                        "id_kategori" => $row['id_kategori'],
                        "id_jenis_kajian" => $row['id_jenis_kajian'],
                        "judul_kajian" => $row['judul_kajian'],
                        "pemateri" => $row['pemateri'],
                        "tanggal" => $row['tanggal'],
                        "tanggal_upload" => $row['tanggal_upload'],
                        "gambar" => $row['gambar'],
                        "lokasi" => $row['lokasi'],
                        "latlng" => $row['latlng'],
                        "link" => $row['link']
                    ));
                }
            }
        }elseif($tanggal1 == null && $tanggal2 == null && $id_kajian == null && $id_kategori == null && $cari != null){
            $query = "SELECT * FROM vw_kajian WHERE nama_kategori LIKE '%$cari%' or judul_kajian LIKE '%$cari%' ORDER BY tanggal DESC";   
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_kajian" => $row['id_kajian'],
                        "id_kategori" => $row['id_kategori'],
                        "id_jenis_kajian" => $row['id_jenis_kajian'],
                        "judul_kajian" => $row['judul_kajian'],
                        "pemateri" => $row['pemateri'],
                        "tanggal" => $row['tanggal'],
                        "tanggal_upload" => $row['tanggal_upload'],
                        "gambar" => $row['gambar'],
                        "lokasi" => $row['lokasi']
                    ));
                }
            }
        }

        echo json_encode($res);

    }

?>