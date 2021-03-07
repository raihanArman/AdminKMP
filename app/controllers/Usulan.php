<?php

class Usulan extends Controller
{
   public function __construct()
   {
      if (!isset($_SESSION['login'])) {
         header('Location: ' . Url::URL . '/Login');
      }
   }

   public function index()
   {
      $data['link']       = 'usulan';
      $data['judul']      = 'usulan';
      $data['usulan']    = $this->model('UsulanModel')->tampilDaftarUsulan();

      $this->view('templates/_header', $data);
      $this->view('usulan/daftar_usulan', $data);
      $this->view('templates/_footer');
   }

   public function notifikasi()
   {
      $data['usulan']    = $this->model('UsulanModel')->tampilDaftarUsulan();
      echo count($data['usulan']);
   }

   public function update()
   {
      if ($this->model('UsulanModel')->updateData($_POST) > 0) {
         Flasher::setFlash('kajian berhasil', 'dipublish', 'success');
         header('Location: ' . Url::URL . '/Usulan');
         exit;
      }
   }
}
