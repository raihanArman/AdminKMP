<?php

    require_once 'koneksi.php';
    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $tanggal = $_GET['tanggal'];

        $res = array();

        $query = "SELECT * FROM tb_kajian  WHERE status = 'publish' AND tanggal_upload = '$tanggal'";
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
        }else{
            $res['value'] = "Gagagl";
        }

        echo json_encode($res);
    }

?>