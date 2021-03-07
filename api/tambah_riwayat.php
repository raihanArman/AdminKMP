<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_usulan = isset($_POST['id_usulan']) ? $_POST['id_usulan'] : false;

        $res = array();


        $query = "INSERT INTO tb_riwayat (id_usulan) VALUES ($id_usulan)";
        $sql = mysqli_query($con, $query);
        if($sql){
            $res['value'] = 1;
            $res['message'] = "Berhasil tambah riwayat";
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal tambah riwayat";
        }


        echo json_encode($res);

    }

?>