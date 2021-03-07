<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_pesan = isset($_POST['id_pesan']) ? $_POST['id_pesan'] : false;

        $res = array();


        $query = "DELETE FROM tb_pesan WHERE id_pesan = $id_pesan";
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