<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        // $id_kajian = isset($_GET['id_kajian']) ? $_GET['id_kajian'] : false;
        $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : false;

        $res = array();

        $query = "SELECT * FROM tb_pesan  WHERE id_user = $id_user";
        $sql = mysqli_query($con, $query);
        if($sql){
            while($row = mysqli_fetch_array($sql)){
                array_push($res, array(
                    "id_pesan" => $row['id_pesan'],
                    "id_user" => $row['id_user'],
                    "pengirim" => $row['pengirim'],
                    "isi" => $row['isi'],
                    "tanggal" => $row['tanggal']
                ));
            }
        }

        echo json_encode($res);

    }

?>