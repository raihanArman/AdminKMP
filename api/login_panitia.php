<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $res = array();

        $query_cek_email = "SELECT * FROM tb_kepanitian WHERE nama = '$username'";
        $sql_cek_email = mysqli_query($con, $query_cek_email);
        if(mysqli_num_rows($sql_cek_email) > 0) {
            $query_login = "SELECT * FROM tb_kepanitian WHERE nama = '$username' and password = '$password'";
            $sql_login = mysqli_query($con, $query_login);
            if(mysqli_num_rows($sql_login) > 0){
                $row = mysqli_fetch_array($sql_cek_email);
                $data['id_kepanitian'] = $row['id_kepanitian'];
                $data['id_proker'] = $row['id_proker'];
                $res = array(
                    "value" => 1,
                    "message" => "Login Berhasil",
                    "data" => $data
                );
            }else{
                $res['value'] = 0;
                $res['message'] = "Password salah";    
            }
        }else{
            $res['value'] = 0;
            $res['message'] = "Username tidak terdaftar";
        }

        echo json_encode($res);

    }

?>