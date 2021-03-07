<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_riwayat = isset($_POST['id_riwayat']) ? $_POST['id_riwayat'] : false;

        $res = array();


        $query = "DELETE FROM tb_riwayat WHERE id_riwayat = $id_riwayat";
        $sql = mysqli_query($con, $query);
        if($sql){
            $res['value'] = 1;
            $res['message'] = "Berhasil hapus pesan";
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal hapus pesan";
        }


        echo json_encode($res);

    }

?>