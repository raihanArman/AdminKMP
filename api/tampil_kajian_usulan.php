<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        // $id_kajian = isset($_GET['id_kajian']) ? $_GET['id_kajian'] : false;
        $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : false;
        $status = isset($_GET['status']) ? $_GET['status'] : false;

        $res = array();
        $data = array();
        $data_mantap = array();

        if($id_user != null && $status == null){
            $query = "SELECT * FROM tb_usulan  WHERE id_user = $id_user";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    $idUsulan = $row['id_usulan'];
                    $idKajian = $row['id_kajian'];
                    $idUser = $row['id_user'];
                    $noTelpPemateri = $row['no_telp_pemateri'];
                    $query1 = "SELECT * FROM tb_kajian  WHERE id_kajian = $idKajian";
                    $sql1 = mysqli_query($con, $query1);
                    if($sql1){
                        $row1 = mysqli_fetch_array($sql1);
                        $res['id_usulan'] = $idUsulan;
                        $res['id_kajian'] = $row1['id_kajian'];
                        $res['id_user'] = $idUser;
                        $res['id_kategori'] = $row1['id_kategori'];
                        $res['id_jenis_kajian'] = $row1['id_jenis_kajian'];
                        $res['judul_kajian'] = $row1['judul_kajian'];
                        $res['pemateri'] = $row1['pemateri'];
                        $res['no_telp_pemateri'] = $noTelpPemateri;
                        $res['tanggal'] = $row1['tanggal'];
                        $res['tanggal_upload'] = $row1['tanggal_upload'];
                        $res['gambar'] = $row1['gambar'];
                        $res['lokasi'] = $row1['lokasi'];
                        $res['latlng'] = $row1['latlng'];
                        $res['link'] = $row1['link'];
                        $res['status'] = $row['status'];

                        array_push($data, $res);

                    }
                }
            }
        }else if($id_user == null && $status != null){
            if($status == "sedang proses"){
                $query = "SELECT * FROM tb_usulan  WHERE status = 'sedang proses'";
            }else{
                $query = "SELECT * FROM tb_usulan  WHERE status != 'sedang proses'";
            }
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    $idUsulan = $row['id_usulan'];
                    $idKajian = $row['id_kajian'];
                    $idUser = $row['id_user'];
                    $noTelpPemateri = $row['no_telp_pemateri'];
                    $query1 = "SELECT * FROM tb_kajian  WHERE id_kajian = $idKajian";
                    $sql1 = mysqli_query($con, $query1);
                    if($sql1){
                        $row1 = mysqli_fetch_array($sql1);
                        $res['id_usulan'] = $idUsulan;
                        $res['id_user'] = $idUser;
                        $res['id_kajian'] = $row1['id_kajian'];
                        $res['id_kategori'] = $row1['id_kategori'];
                        $res['id_jenis_kajian'] = $row1['id_jenis_kajian'];
                        $res['judul_kajian'] = $row1['judul_kajian'];
                        $res['pemateri'] = $row1['pemateri'];
                        $res['no_telp_pemateri'] = $noTelpPemateri;
                        $res['tanggal'] = $row1['tanggal'];
                        $res['tanggal_upload'] = $row1['tanggal_upload'];
                        $res['gambar'] = $row1['gambar'];
                        $res['lokasi'] = $row1['lokasi'];
                        $res['latlng'] = $row1['latlng'];
                        $res['status'] = $row['status'];
                        $res['link'] = $row1['link'];

                        array_push($data, $res);

                    }
                }
            }
        }

        echo json_encode($data);

    }

?>