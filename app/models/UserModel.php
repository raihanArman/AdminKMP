<?php

class UserModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM tb_user WHERE level = "user"');
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
}
