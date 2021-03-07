<?php

class User extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . Url::URL . '/Login');
        }
    }

    public function index()
    {
        $data['link']   = 'user';
        $data['judul']  = 'Daftar User';
        $data['user']   = $this->model('UserModel')->getAllUser();
        $this->view('templates/_header', $data);
        $this->view('user/daftar_user', $data);
        $this->view('templates/_footer');
    }

    // Edit Status
    public function edit($id, $status)
    {
        if ($this->model('UserModel')->editData($id, $status) > 0 && $status == 'Aktif') {
            Flasher::setFlash('user berhasil', 'di-non aktifkan ', 'success');
            header('Location: ' . Url::URL . '/User');
            exit;
        }else{
            Flasher::setFlash('user berhasil', 'di aktifkan ', 'success');
            header('Location: ' . Url::URL . '/User');
            exit;
        }
    }
}
