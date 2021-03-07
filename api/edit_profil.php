<?php
    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_user = $_POST['id_user'];
        $nama = isset($_POST['nama']) ? $_POST['nama'] : false;
        $email = isset($_POST['email']) ? $_POST['email'] : false;
        $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : false;
        $noTelp = isset($_POST['no_telp']) ? $_POST['no_telp'] : false;
        $gambar = isset($_POST['gambar']) ? $_POST['gambar'] : false;

        $res = array();

        if($gambar != null){
            $query_tampil = "SELECT * FROM tb_user WHERE id_user = $id_user";
            $sql_tampil = mysqli_query($con, $query_tampil);
            if($sql_tampil){
                $row = mysqli_fetch_array($sql_tampil);
                if($row['gambar'] != ""){
                    unlink("../public/img/profil/".$row['gambar']);
                }
                $path = "../public/img/profil/";
                $filename = "profil_".rand(9,999).".jpeg";
                $destination = $path.$filename;
                $query_edit = "UPDATE tb_user SET email = '$email', nama = '$nama', alamat = '$alamat',no_telp = '$noTelp', gambar = '$filename' WHERE id_user = $id_user";
                $sql_edit = mysqli_query($con, $query_edit);
                if($sql_edit){
                    file_put_contents($destination, base64_decode($gambar));
                     $res['value'] = 1;
                    $res['message'] = "Berhasil edit";
                }else{
                    $res['value'] = 0;
                    $res['message'] = "Gagal edit";
                 }
            }
        }else{
            $query_edit = "UPDATE tb_user SET email = '$email', nama = '$nama', alamat = '$alamat',no_telp = '$noTelp' WHERE id_user = $id_user";
            $sql_edit = mysqli_query($con, $query_edit);
            if($sql_edit){
                $res['value'] = 1;
                $res['message'] = "Berhasil edit";
            }else{
                $res['value'] = 0;
                $res['message'] = "Gagal edit";
            }
        }


        echo json_encode($res);


    }

?>