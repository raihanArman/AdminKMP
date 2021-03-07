<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id_pertemuan = $_GET['id_pertemuan'];

        $data = array();
        $res = array();

        $query = "SELECT * FROM tb_pertemuan WHERE id_pertemuan = $id_pertemuan";
        $sql = mysqli_query($con, $query);

        if($sql){
            $row = mysqli_fetch_array($sql);
            $data['id_pertemuan'] = $row['id_pertemuan'];
            $data['nama_pertemuan'] = $row['nama_pertemuan'];
            $data['tanggal'] = $row['tanggal'];
            $data['catatan'] = $row['catatan'];
            $data['kehadiran'] = $row['kehadiran'];
            $data['status'] = $row['status'];

            $res = array(
                "status" => "sukses",
                "message" => "Berhasil menampilkan data",
                "data" => $data
            );

        }

        echo json_encode($res);

    }


?>