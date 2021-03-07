<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $idKategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;

        $res = array();

        if($idKategori != null){
            $query = "SELECT * FROM tb_kategori WHERE id_kategori = $idKategori";
            $sql = mysqli_query($con, $query);
            if($sql){
                $row = mysqli_fetch_array($sql);
                $res['id_kategori'] = $row['id_kategori'];
                $res['nama_kategori'] = $row['nama_kategori'];
            }
        }else{
            $query = "SELECT * FROM tb_kategori";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    array_push($res, array(
                        "id_kategori" => $row['id_kategori'],
                        "nama_kategori" => $row['nama_kategori']
                    ));
                }
            }
        }

        echo json_encode($res);

    }

?>