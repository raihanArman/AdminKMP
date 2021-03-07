<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $res = array();
        $data = array();

        $queryProker = "SELECT SUM(progress) as progress_proker, COUNT(id_proker) as jum_proker FROM tb_proker";
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

        echo json_encode($res);

    }

?>