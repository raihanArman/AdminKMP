<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id_pertemuan = $_GET['id_pertemuan'];

        $data = array();
        $res = array();

        $query = "SELECT * FROM tb_dokumentasi WHERE id_pertemuan = $id_pertemuan";
        $sql = mysqli_query($con, $query);

        if($sql){
            while($row = mysqli_fetch_array($sql)){
                array_push($data, array(
                    "id_dokumentasi" => $row['id_dokumentasi'],
                    "gambar" => $row['gambar'],
                    "keterangan" => $row['keterangan']
                ));
            }

            $res = array(
                "status" => "sukses",
                "message" => "Berhasil menampilkan data",
                "data" => $data
            );

        }else{
            $res['status'] = "gagal";
            $res['message'] = "Gagal menampilkan data";
        }

        echo json_encode($res);

    }


?>