<?php

class LoginModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // mencari data admin berdasarkan username
    public function getDataAdmin($data)
    {
        $this->db->query('SELECT * FROM tb_admin WHERE username = :username');
        $this->db->bind('username', $data['username']);

        $this->db->single();
        return $this->db->rowCount();
    }

    //mengambil data admin untuk divalidasi 
    public function getAdmin($data)
    {
        $this->db->query('SELECT * FROM tb_admin WHERE username=:username');
        $this->db->bind('username', $data['username']);
        $this->db->single();

        return $this->db->single();
    }

    // public function registrasi()
    // {
    //     // enkripsi password
    //     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //     $query = "insert into admin value('', 'Zaenal', 'Zaenal', :password)";
    //     $this->db->query($query);
    //     $this->db->bind('password', $password);
    //     $this->db->execute();

    // }
}
