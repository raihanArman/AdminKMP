<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $idDivisi = $_GET['id_divisi'];

        $res = array();
        $data = array();

        $query = "SELECT * FROM tb_divisi WHERE id_divisi = $idDivisi";
        $sql = mysqli_query($con, $query);
        if($sql){
            $row = mysqli_fetch_array($sql);
            $data['id_divisi'] = $row['id_divisi'];
            $data['nama_divisi'] = $row['nama_divisi'];
            $data['nama_ketua'] = $row['nama_ketua'];
            $data['username'] = $row['username'];

            $queryProker = "SELECT SUM(progress) as progress_proker, COUNT(id_proker) as jum_proker FROM tb_proker WHERE id_divisi = $idDivisi";
            $sqlProker = mysqli_query($con, $queryProker);
            if($sqlProker){
                $rowProker = mysqli_fetch_array($sqlProker);
                $progress =  $rowProker['progress_proker']/ max($rowProker['jum_proker'], 1); 
                $data['progress'] = $progress;
                $data['jum_proker'] = $rowProker['jum_proker'];

                $res = array(
                    "status" => "sukses",
                    "message" => "Berhasil menampilkan data",
                    "data" => $data
                );
            }
        }


        echo json_encode($res);

    }

?>