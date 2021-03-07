<?php

class Login extends Controller
{
    public function __construct()
    {
    }
    // Menampilkan form login admin
    public function index()
    {
        $data['pesan'] = '';
        $this->view('login/login', $data);
    }



    public function validasi()
    {
        if (!isset($_POST['username']) || !isset($_POST['password'])) {
            header('Location: ' . Url::URL . '/Login');

        } else {
            if ($this->model('LoginModel')->getDataAdmin($_POST) > 0) {
                $data = $this->model('LoginModel')->getAdmin($_POST);
                if ($data['password'] == $_POST['password']) {
                    $_SESSION['login'] = true;
                    header('Location: ' . Url::URL . '/Divisi');
                    exit;
                }else{
                    Flasher::setFlasher('Password Salah', 'silahkan tunggu konfirmasi admin lewat email yang telah didaftarkan', 'danger');
                    $data['pesan'] = 'Username atau password tidak sesuai !';
                    $this->view('login/login', $data);
                }
            } else {
                $data['pesan'] = 'Username atau password tidak sesuai !';
                $this->view('login/login', $data);
            }
        }
    }

}
