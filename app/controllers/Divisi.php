<?php

class Divisi extends Controller
{
    public function __construct()
    {
    }



    // menampilkan seluruh data kajian yang telah ada di database
    public function index()
    {
        $data['link']       = 'divisi';
        $data['judul']      = 'divisi';
        $data['kajian']    = $this->model('DivisiModel')->tampilDivisi();

        $this->view('templates/_header', $data);
        $this->view('divisi/daftar_divisi', $data);
        $this->view('templates/_footer');
    }

    // menampilkan form insert data kajian ke dalam database
    public function insert()
    {
        $data['link']           = 'divisi';
        $data['judul']          = 'Tambahkan divisi';

        $this->view('templates/_header', $data);
        $this->view('divisi/insert_divisi', $data);
        $this->view('templates/_footer');
    }

    // memasukkan data kajian ke dalam database
    public function input()
    {
        if ($this->model('DivisiModel')->addData($_POST) > 0) {
            Flasher::setFlash('Divisi berhasil', 'ditambahkan', 'success');
            header('Location: ' . Url::URL . '/Divisi');
            exit;
        }else{
            Flasher::setFlash('Divisi gagal', 'ditambahkan', 'danger');
            header('Location: ' . Url::URL . '/Divisi');
            exit;
        }
    }

    // menampilkan form edit data kajian yang telah ada di dalam database
    public function edit($id)
    {
        $data['link']           = 'divisi';
        $data['judul']          = 'Edit Divisi';
        $data['divisi']   = $this->model('DivisiModel')->selectById($id);

        // var_dump($data);die;
        $this->view('templates/_header', $data);
        $this->view('divisi/edit_divisi', $data);
        $this->view('templates/_footer');
    }

    // mengedit data kajian yang telah ada di dalam database
    public function update()
    {
        if ($this->model('DivisiModel')->editData($_POST) > 0) {
            Flasher::setFlash('Divisi berhasil', 'diedit', 'success');
            header('Location: ' . Url::URL . '/Divisi');
            exit;
        } else {
            Flasher::setFlash('Divisi gagal', 'diedit', 'warning');
            header('Location: ' . Url::URL . '/Divisi');
            exit;
        }
    }

    // menghapus data kajian yang yang telah ada didalam database
    public function hapus($id)
    {
        if ($this->model('KajianModel')->hapusData($id) > 0) {
            Flasher::setFlash('kajian berhasil', 'dihapus', 'success');
            header('Location:' . Url::URL . '/Kajian');
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
