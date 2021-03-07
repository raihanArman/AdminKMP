<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : false;
        $pengirim = isset($_POST['pengirim']) ? $_POST['pengirim'] : false;
        $isi = isset($_POST['isi']) ? $_POST['isi'] : false;

        $res = array();


        $query = "INSERT INTO tb_pesan (id_user, pengirim, isi) VALUES ($id_user, $pengirim, '$isi')";
        $sql = mysqli_query($con, $query);
        if($sql){
            $res['value'] = 1;
            $res['message'] = "Berhasil tambah pesan";
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal tambah pesan";
        }


        echo json_encode($res);

    }

?>