<?php

class Proker extends Controller
{
    public function __construct()
    {
    }



    // menampilkan seluruh data kajian yang telah ada di database
    public function index()
    {
        $data['link']       = 'proker';
        $data['judul']      = 'proker';
        $data['proker']    = $this->model('ProkerModel')->tampilProker();

        $this->view('templates/_header', $data);
        $this->view('proker/daftar_proker', $data);
        $this->view('templates/_footer');
    }

    // menampilkan form insert data kajian ke dalam database
    public function insert()
    {
        $data['link']           = 'divisi';
        $data['judul']          = 'Tambahkan Proker';       
        $data['divisi']   = $this->model('ProkerModel')->selectDivisi();



        $this->view('templates/_header', $data);
        $this->view('proker/insert_proker', $data);
        $this->view('templates/_footer');
    }

    // memasukkan data kajian ke dalam database
    public function input()
    {
        if ($this->model('ProkerModel')->addData($_POST) > 0) {
            Flasher::setFlash('Proker berhasil', 'ditambahkan', 'success');
            header('Location: ' . Url::URL . '/Proker');
            exit;
        }else{
            Flasher::setFlash('Proker gagal', 'ditambahkan', 'danger');
            header('Location: ' . Url::URL . '/Proker');
            exit;
        }
    }

    // menampilkan form edit data kajian yang telah ada di dalam database
    public function edit($id)
    {
        $data['link']           = 'divisi';
        $data['judul']          = 'Edit Proker';
        $data['proker']   = $this->model('ProkerModel')->selectById($id);
        $data['divisi']   = $this->model('ProkerModel')->selectDivisi();

        // var_dump($data);die;
        $this->view('templates/_header', $data);
        $this->view('proker/edit_proker', $data);
        $this->view('templates/_footer');
    }

    // mengedit data kajian yang telah ada di dalam database
    public function update()
    {
        if ($this->model('ProkerModel')->editData($_POST) > 0) {
            Flasher::setFlash('Proker berhasil', 'diedit', 'success');
            header('Location: ' . Url::URL . '/Proker');
            exit;
        } else {
            Flasher::setFlash('Proker gagal', 'diedit', 'warning');
            header('Location: ' . Url::URL . '/Proker');
            exit;
        }
    }

    // menghapus data kajian yang yang telah ada didalam database
    public function hapus($id)
    {
        if ($this->model('ProkerModel')->hapusData($id) > 0) {
            Flasher::setFlash('Proker berhasil', 'dihapus', 'success');
            header('Location:' . Url::URL . '/Proker');
            exit;
        }else{
            Flasher::setFlash('Proker gagal', 'dihapus', 'danger');
            header('Location:' . Url::URL . '/Proker');
            exit;
        }
    }

    // menampilkan detail data kajian yang yang telah ada didalam database
    public function detail($id)
    {
        $data['link']       = 'kajian';
        $data['judul']      = 'Detail Kajian';
        $data['detail']     = $this->model('KajianModel')->selectById($id);

        $this->view('templates/_header', $data);
        $this->view('kajian/detail_kajian', $data);
        $this->view('templates/_footer');
    }
}
