<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : false;

        $res = array();

        if($id_user != null){
            $query = "SELECT * FROM tb_user WHERE id_user = $id_user AND level = 'user'";
            $sql = mysqli_query($con, $query);
            if($sql){
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_array($sql);
                    $idUser = $row['id_user'];
                    $email = $row['email'];
                    $nama = $row['nama'];
                    $noTelp = $row['no_telp'];
                    $alamat = $row['alamat'];
                    $gambar = $row['gambar'];
                    if($email != null || $email != ""){
                        if($nama != null || $nama != ""){
                            if($noTelp != null || $noTelp != ""){
                                if($alamat != null || $alamat != ""){
                                    if($gambar != null || $gambar != ""){
                                        $res['value'] = 1;
                                        $res['message'] = "Data lengkap";  
                                    }else{
                                        $res['value'] = 0;
                                        $res['message'] = "Data belum lengkap";
                                    }
                                }else{
                                    $res['value'] = 0;
                                    $res['message'] = "Data belum lengkap";
                                }
                            }else{
                                $res['value'] = 0;
                                $res['message'] = "Data belum lengkap";
                            }
                        }else{
                            $res['value'] = 0;
                            $res['message'] = "Data belum lengkap";
                        }
                    }else{
                        $res['value'] = 0;
                        $res['message'] = "Data belum lengkap";
                    }
                }
            }
        }


        echo json_encode($res);

    }

?>