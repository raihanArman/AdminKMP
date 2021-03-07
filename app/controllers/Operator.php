<?php
class Operator extends Controller
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
        $data['operator'] = $this->model('OperatorModel')->getAllOperator();

        $this->view('templates/_header', $data);
        $this->view('operator/daftar_operator', $data);
        $this->view('templates/_footer');
    }

    public function edit($id, $status)
    {
        if ($this->model('UserModel')->editData($id, $status) > 0 && $status == 'Aktif') {
            Flasher::setFlash('operator berhasil', 'di-non aktifkan ', 'success');
            header('Location: ' . Url::URL . '/Operator');
            exit;
        } else {
            Flasher::setFlash('operator berhasil', 'di aktifkan ', 'success');
            header('Location: ' . Url::URL . '/Operator');
            exit;
        }
    }

    // menampilkan form insert data operator ke dalam database
    public function insert()
    {
        $data['judul']  = 'Tambah Operator';
        $data['link']   = 'operator';
        
        $data['jenis_kajian']   = $this->model('KajianModel')->selectJenisKajian();
        $data['kategori']       = $this->model('KajianModel')->selectKategori();

        $this->view('templates/_header', $data);
        $this->view('operator/tambah_operator', $data);
        $this->view('templates/_footer');
    }

    // memasukkan data operator ke dalam database
    public function input()
    {
        if ($this->model('OperatorModel')->addData($_POST) > 0) {
            Flasher::setFlash('Operator berhasil', 'ditambahkan', 'success');
            header('Location: ' . Url::URL . '/Operator');
            exit;
        }
    }


}
