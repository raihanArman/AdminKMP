<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $idJenisKajian = isset($_GET['id_jenis_kajian']) ? $_GET['id_jenis_kajian'] : false;

        $res = array();

        if($idJenisKajian != null){
            $query = "SELECT * FROM tb_jenis_kajian WHERE id_jenis_kajian = $idJenisKajian";
            $sql = mysqli_query($con, $query);
            if($sql){
                $row = mysqli_fetch_array($sql);
                $res['id_jenis_kajian'] = $row['id_jenis_kajian'];
                $res['nama_jenis_kajian'] = $row['nama_jenis_kajian'];
            }
        }else{
            $query = "SELECT * FROM tb_jenis_kajian";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_jenis_kajian" => $row['id_jenis_kajian'],
                        "nama_jenis_kajian" => $row['nama_jenis_kajian']
                    ));
                }
            }
        }

        echo json_encode($res);

    }

?>