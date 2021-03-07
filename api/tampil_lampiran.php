<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        // $id_kajian = isset($_GET['id_kajian']) ? $_GET['id_kajian'] : false;
        $id_usulan = isset($_GET['id_usulan']) ? $_GET['id_usulan'] : false;

        $res = array();

        $query = "SELECT * FROM tb_lampiran  WHERE id_usulan = $id_usulan";
        $sql = mysqli_query($con, $query);
        if($sql){
            while($row = mysqli_fetch_array($sql)){
                array_push($res, array(
                    "id_lampiran" => $row['id_lampiran'],
                    "keterangan" => $row['keterangan'],
                    "gambar" => $row['gambar']
                ));
            }
        }

        echo json_encode($res);

    }

?>