<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        // $id_kajian = isset($_GET['id_kajian']) ? $_GET['id_kajian'] : false;
        $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : false;

        $res = array();

        $query = "SELECT COUNT(*) as jumlah_pesan FROM tb_pesan  WHERE id_user = $id_user";
        $sql = mysqli_query($con, $query);
        if($sql){
            $row = mysqli_fetch_array($sql);
            $res['jumlah_pesan'] = $row['jumlah_pesan'];
        }

        echo json_encode($res);

    }

?>