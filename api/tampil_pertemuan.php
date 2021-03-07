<?php

    require_once 'koneksi.php';
    $res = array();
    $data = array();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $idProker = $_GET['id_proker'];

        $query = "SELECT * FROM tb_pertemuan WHERE id_proker = $idProker";
        $sql = mysqli_query($con, $query);
        if($sql){
            while($row = mysqli_fetch_array($sql)){
                array_push($data, array(
                    "id_pertemuan" => $row['id_pertemuan'],
                    "id_proker" => $row['id_proker'],
                    "nama_pertemuan" => $row['nama_pertemuan'],
                    "tanggal" => $row['tanggal'],
                    "catatan" => $row['catatan'],
                    "kehadiran" => $row['kehadiran'],
                    "status" => $row['status'],
                )); 
            }
            $res = array(
                "status" => "sukses",
                "message" => "Berhasil menampilkan data",
                "data" => $data
            );

        }

        echo json_encode($res);

    }

?>