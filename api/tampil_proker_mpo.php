<?php

    require_once 'koneksi.php';
    $res = array();
    $data = array();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $query = "SELECT * FROM tb_proker";
        $sql = mysqli_query($con, $query);
        if($sql){
            while($row = mysqli_fetch_array($sql)){
                $queryProker = "SELECT COUNT(*) as jml_pertemuan FROM tb_pertemuan WHERE id_proker = $row[id_proker]";
                $sqlProker = mysqli_query($con, $queryProker);
                if($sqlProker){
                    $rowProker = mysqli_fetch_array($sqlProker);

                    $querySelesai = "SELECT IFNULL(COUNT(*), 0) as jml_pertemuan_selesai FROM tb_pertemuan WHERE id_proker = $row[id_proker] AND status = '1'";
                    $sqlSelesai = mysqli_query($con, $querySelesai);
                    if($sqlSelesai){
                        
                        $rowSelesai = mysqli_fetch_array($sqlSelesai);
                        $progress =  $rowSelesai['jml_pertemuan_selesai']/ max($rowProker['jml_pertemuan'], 1); 

                        array_push($data, array(
                            "id_proker" => $row['id_proker'],
                            "nama_proker" => $row['nama_proker'],
                            "jml_pertemuan" => $rowProker['jml_pertemuan'],
                            "jml_pertemuan_selesai" => $rowSelesai['jml_pertemuan_selesai'],
                            "progress" => $progress,
                            "status" => $row['status']
                        )); 
                    }
                }
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