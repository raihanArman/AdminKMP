<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $res = array();
        $data = array();
        $data_mantap = array();

        $query = "SELECT * FROM tb_riwayat";
            $sql = mysqli_query($con, $query);
            if($sql){
                while($row = mysqli_fetch_array($sql)){
                    $idRiwayat = $row['id_riwayat'];
                    $idUsulan = $row['id_usulan'];
                    $tanggalUpdate = $row['tanggal'];
                    $queryUsulan = "SELECT * FROM tb_usulan  WHERE id_usulan = $idUsulan";
                    $sqlUsulan = mysqli_query($con, $queryUsulan);
                    if($sql){
                        $rowUsulan = mysqli_fetch_array($sqlUsulan);
                        $idUser = $rowUsulan['id_user'];
                        $noTelpPemateri = $rowUsulan['no_telp_pemateri'];
                        $status = $rowUsulan['status'];
                        $idKajian = $rowUsulan['id_kajian'];
                        $query1 = "SELECT * FROM tb_kajian  WHERE id_kajian = $idKajian";
                        $sql1 = mysqli_query($con, $query1);
                        if($sql1){
                            $row1 = mysqli_fetch_array($sql1);
                            $res['id_riwayat'] = $idRiwayat;
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
                            $res['status'] = $status;
                            $res['tanggal_update'] = $tanggalUpdate;

                            array_push($data, $res);

                        }
                    }
                }
            }
        
        echo json_encode($data);

    }

?>