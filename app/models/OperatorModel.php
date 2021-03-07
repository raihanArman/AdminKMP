<?php

class OperatorModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllOperator()
    {
        $this->db->query('SELECT * FROM tb_user WHERE level = "operator"');
        return $this->db->resultSet();
    }

    public function editData($id, $status)
    {
        $query = "UPDATE tb_user SET status = :status WHERE id_user = :id_user";
        if ($status == 'Aktif') {
            $status = 'Tidak Aktif';
        } else {
            $status = 'Aktif';
        }

        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function addData($data)
    {
        // Gambar
        $file_name = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp_name, "img/$file_name");

        $query = "INSERT INTO tb_user 
            (password, username, alamat, no_telp, gambar, level, status) VALUES
            (:password, :username, :alamat, :no_telp, :gambar, :level, :status)"; 
        $this->db->query($query);

          
        $this->db->bind('password', $data['password']);
        $this->db->bind('username', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['telp']);
        $this->db->bind('gambar', $file_name);
        $this->db->bind('level', 'Operator');
        $this->db->bind('status', 'Aktif');
        

        $this->db->execute();

        return $this->db->rowCount();
    }
}
