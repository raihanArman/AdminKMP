<?php

    require_once 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

        $res = array();
        
        $queryDivisi = "SELECT * FROM tb_divisi";
        $sqlDivisi = mysqli_query($con, $queryDivisi);
        if($sqlDivisi){
            $data_divisi = array();
            while($rowDivisi = mysqli_fetch_array($sqlDivisi)){
                
                $queryProgress = "SELECT tb_pertemuan.nama_pertemuan, tb_pertemuan.status FROM tb_proker, tb_pertemuan, tb_divisi WHERE tb_divisi.id_divisi = tb_proker.id_divisi AND tb_pertemuan.id_proker = tb_proker.id_proker AND tb_divisi.id_divisi = $rowDivisi[id_divisi]";
                $sqlProgress = mysqli_query($con, $queryProgress);
                if($sqlProgress){
                    $data_pertemuan = array();
                    while($rowProgress = mysqli_fetch_array($sqlProgress)){
                        array_push($data_pertemuan, array(
                            "nama_pertemuan" => $rowProgress['nama_pertemuan'],
                            "status" => $rowProgress['status']
                        )); 
                    }

                    $data_divisi = array(
                        "id_divisi" => $rowDivisi['id_divisi'],
                        "divisi" => $rowDivisi['nama_divisi'],
                        "data_pertemuan" => $data_pertemuan
                    );

                    array_push($res, $data_divisi);

                }
            }
            

        }


        echo json_encode($res);

    }

?>