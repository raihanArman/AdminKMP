<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        $res = array();
        $data = array();

        $query = "SELECT * FROM tb_proker";
        $sql = mysqli_query($con, $query);
        if($sql){
            $hasil = 0;
            while($row = mysqli_fetch_array($sql)){
                $k = $row['progress'] * $row['bobot'];
                $hasil = $hasil + $k;
            }

            $data['hasil'] = $hasil;
            
            // if($hasil >= 0.0 && $hasil <= 0.5){
            //     $data['keputusan'] = "Kurang Baik";
            // }else if($hasil >= 0.51 && $hasil <= 1){
            //     $data['keputusan'] = "Baik";
            // }

            $res = array(
                "status" => "Berhasil menghitung metode",
                "data" => $hasil
            );

        }else{
            $res = array(
                "status" => "Gagal menghitung metode",
                "data" => $hasil
            );
        }
        
        echo json_encode($res);

    }

?>