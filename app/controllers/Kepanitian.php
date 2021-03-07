<?php
class Kepanitian extends Controller
{
    public function __construct()
    { 
        if (!isset($_SESSION['login'])) {
            header('Location: '.Url::URL. '/Login');
        }
    }

    // Daftar sepatu
    public function index()
    {
        $data['judul'] = 'Operator';
        $data['link'] = 'operator';
        $data['kepanitian'] = $this->model('KepanitianModel')->tampilKepanitian();

        $this->view('templates/_header', $data);
        $this->view('kepanitian/daftar_kepanitian', $data);
        $this->view('templates/_footer');
    }
    
    // mengedit data kajian yang telah ada di dalam database
    public function update()
    {
        if ($this->model('KepanitianModel')->editData($_POST) > 0) {
            Flasher::setFlash('Kepanitian berhasil', 'diedit', 'success');
            header('Location: ' . Url::URL . '/Kepanitian');
            exit;
        } else {
            Flasher::setFlash('Kepanitian gagal', 'diedit', 'warning');
            header('Location: ' . Url::URL . '/Kepanitian');
            exit;
        }
    }

    public function edit($id)
    {
        $data['link']           = 'pertemuan';
        $data['judul']          = 'Edit Kepanitian';
        $data['kepanitian']   = $this->model('KepanitianModel')->selectById($id);
        $data['proker']   = $this->model('KepanitianModel')->selectProker();

        // var_dump($data);die;
        $this->view('templates/_header', $data);
        $this->view('kepanitian/edit_kepanitian', $data);
        $this->view('templates/_footer');
    }

    // menampilkan form insert data operator ke dalam database
    public function insert()
    {
        $data['judul']  = 'Tambah Kepanitian';
        $data['link']   = 'kepanitian';
        
        $data['proker']   = $this->model('KepanitianModel')->selectProker();

        $this->view('templates/_header', $data);
        $this->view('kepanitian/insert_kepanitian', $data);
        $this->view('templates/_footer');
    }

    // memasukkan data operator ke dalam database
    public function input()
    {
        if ($this->model('KepanitianModel')->addData($_POST) > 0) {
            Flasher::setFlash('Kepanitian berhasil', 'ditambahkan', 'success');
            header('Location: ' . Url::URL . '/Kepanitian');
            exit;
        }else{
            Flasher::setFlash('Kepanitian gagal', 'ditambahkan', 'success');
            header('Location: ' . Url::URL . '/Kepanitian');
            exit;
        }
    }


    public function hapus($id)
    {
        if ($this->model('KepanitianModel')->hapusData($id) > 0) {
            Flasher::setFlash('Kepanitian berhasil', 'dihapus', 'success');
            header('Location:' . Url::URL . '/Kepanitian');
            exit;
        }else{
            Flasher::setFlash('Kepanitian gagal', 'dihapus', 'danger');
            header('Location:' . Url::URL . '/Kepanitian');
            exit;
        }
    }


}
