<?php

class Pertemuan extends Controller
{
    public function __construct()
    {
    }

    // menampilkan seluruh data kajian yang telah ada di database
    public function index()
    {
        $data['link']       = 'pertemuan';
        $data['judul']      = 'pertemuan';
        $data['pertemuan']    = $this->model('PertemuanModel')->tampilPertemuan();

        $this->view('templates/_header', $data);
        $this->view('pertemuan/daftar_pertemuan', $data);
        $this->view('templates/_footer');
    }

    // menampilkan form insert data kajian ke dalam database
    public function insert()
    {
        $data['link']           = 'divisi';
        $data['judul']          = 'Tambahkan Pertemuan';       
        $data['proker']   = $this->model('PertemuanModel')->selectProker();

        $this->view('templates/_header', $data);
        $this->view('pertemuan/insert_pertemuan', $data);
        $this->view('templates/_footer');
    }

    // memasukkan data kajian ke dalam database
    public function input()
    {
        if ($this->model('PertemuanModel')->addData($_POST) > 0) {
            Flasher::setFlash('Pertemuan berhasil', 'ditambahkan', 'success');
            header('Location: ' . Url::URL . '/Pertemuan');
            exit;
        }else{
            Flasher::setFlash('Pertemuan gagal', 'ditambahkan', 'danger');
            header('Location: ' . Url::URL . '/Pertemuan');
            exit;
        }
    }

    // menampilkan form edit data kajian yang telah ada di dalam database
    public function edit($id)
    {
        $data['link']           = 'pertemuan';
        $data['judul']          = 'Edit Pertemuan';
        $data['pertemuan']   = $this->model('PertemuanModel')->selectById($id);
        $data['proker']   = $this->model('PertemuanModel')->selectProker();

        // var_dump($data);die;
        $this->view('templates/_header', $data);
        $this->view('pertemuan/edit_pertemuan', $data);
        $this->view('templates/_footer');
    }

    // mengedit data kajian yang telah ada di dalam database
    public function update()
    {
        if ($this->model('PertemuanModel')->editData($_POST) > 0) {
            Flasher::setFlash('Pertemuan berhasil', 'diedit', 'success');
            header('Location: ' . Url::URL . '/Pertemuan');
            exit;
        } else {
            Flasher::setFlash('Pertemuan gagal', 'diedit', 'warning');
            header('Location: ' . Url::URL . '/Pertemuan');
            exit;
        }
    }

    // menghapus data kajian yang yang telah ada didalam database
    public function hapus($id)
    {
        if ($this->model('PertemuanModel')->hapusData($id) > 0) {
            Flasher::setFlash('Pertemuan berhasil', 'dihapus', 'success');
            header('Location:' . Url::URL . '/Pertemuan');
            exit;
        }else{
            Flasher::setFlash('Pertemuan gagal', 'dihapus', 'danger');
            header('Location:' . Url::URL . '/Pertemuan');
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
