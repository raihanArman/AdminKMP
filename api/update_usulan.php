<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_usulan = $_POST['id_usulan'];
        $status = $_POST['status'];


        $res = array();

        $query = "UPDATE tb_usulan SET status = '$status' WHERE id_usulan = $id_usulan";
        $sql = mysqli_query($con, $query);
        if($sql){
            $res['value'] = 1;
            $res['message'] = "Berhasil Update";
        }else{
            $res['value'] = 1;
            $res['message'] = "Gagal Update";
        }

        
        echo json_encode($res);

    }

?>