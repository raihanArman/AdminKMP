<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $catatan = $_POST['catatan'];
        $kehadiran = $_POST['kehadiran'];
        $id_pertemuan = $_POST['id_pertemuan'];
        $id_proker = $_POST['id_proker'];
        
        $res = array();
        $data = array();

        $query = "UPDATE tb_pertemuan SET catatan = '$catatan', kehadiran = '$kehadiran', status = '1' WHERE id_pertemuan = $id_pertemuan";
        $sql = mysqli_query($con, $query);
        if($sql){


            $queryProker = "SELECT COUNT(*) as jml_pertemuan FROM tb_pertemuan WHERE id_proker = $id_proker";
                $sqlProker = mysqli_query($con, $queryProker);
                if($sqlProker){
                    $rowProker = mysqli_fetch_array($sqlProker);

                    $querySelesai = "SELECT IFNULL(COUNT(*), 0) as jml_pertemuan_selesai FROM tb_pertemuan WHERE id_proker = $id_proker AND status = '1'";
                    $sqlSelesai = mysqli_query($con, $querySelesai);
                    if($sqlSelesai){
                        
                        $rowSelesai = mysqli_fetch_array($sqlSelesai);
                        $progress =  $rowSelesai['jml_pertemuan_selesai']/ max($rowProker['jml_pertemuan'], 1); ;

                        $queryUpdateProker = "UPDATE tb_proker SET progress = $progress WHERE id_proker = $id_proker";
                        $sqlUpdateProker = mysqli_query($con, $queryUpdateProker);
                        if($sqlUpdateProker){    

                            $queryBelumSelesai = "SELECT IFNULL(COUNT(*), 0) as jml_belum_selesai FROM tb_pertemuan WHERE id_proker = $id_proker AND status = '0'";
                            $sqlBelumSelesai = mysqli_query($con, $queryBelumSelesai);
                            if($sqlBelumSelesai){
                                $rowBelumSelesai = mysqli_fetch_array($sqlBelumSelesai);
                                if($rowBelumSelesai['jml_belum_selesai'] == 0){
                                    $queryUpdateProkerSelesai = "UPDATE tb_proker SET status = '1' WHERE id_proker = $id_proker";
                                    $sqlUpdateProkerSelesai = mysqli_query($con, $queryUpdateProkerSelesai);
    
                                    if($sqlUpdateProkerSelesai){
                                        $res['value'] = 1;
                                        $res['message'] = "Berhasil edit pertemuan";
                                    }   
                                }else{
                                    $res['value'] = 1;
                                    $res['message'] = "Berhasil edit pertemuan";
                                }
                            }           
                        }

                    }
                }  
        }else{
            $res['value'] = 0;
            $res['message'] = "Gagal edit pertemuan"; 
        }

        echo json_encode($res);

    }

?>