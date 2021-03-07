<?php

class DivisiModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // mangambil seluruh data kajian dari table tb_kajian
    public function tampilDivisi()
    {
        $this->db->query("SELECT * FROM tb_divisi");
        return $this->db->resultSet();
    }

    // menampilkan detail kajian
    public function selectById($id)
    {
        $query = "SELECT * FROM tb_divisi WHERE id_divisi = :id_divisi";
        $this->db->query($query);
        $this->db->bind('id_divisi', $id);

        return $this->db->single();
    }

    // menampilkan daftar jenis kajian di form tambah kajian (insert_kajian.php)
    public function selectJenisKajian()
    {
        $this->db->query("SELECT * FROM tb_jenis_kajian");
        return $this->db->resultSet();
    }

    // menampilkan daftar kategori kajian di form tambah kajian (insert_kajian.php)
    public function selectKategori()
    {
        $this->db->query("SELECT * FROM tb_kategori");
        return $this->db->resultSet();
    }

    // menambahkan data kajian ke dalam table tb_kajian
    public function addData($data)
    {
        // waktu_upload
        $query = "INSERT INTO tb_divisi 
            (nama_divisi, nama_ketua, username, password) 
                VALUES 
            (:nama_divisi, :nama_ketua, :username, :password)";

        $this->db->query($query);

        $this->db->bind('nama_divisi', $data['nama_divisi']);
        $this->db->bind('nama_ketua', $data['nama_ketua']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Mengubah data kajian ditable tb_kajian
    public function editData($data)
    {

        $query = "UPDATE tb_divisi SET
            nama_divisi     = :nama_divisi,
            nama_ketua    = :nama_ketua,
            username        = :username, 
            password         = :password       
            WHERE id_divisi = :id_divisi";
        // judul_kajian    = :judul_kajian 
        // pemateri        = :pemateri, 
        // tanggal_upload  = :tanggal_upload,
        // gambar          = :gambar,
        // lokasi          = :lokasi,
        // latlng          = :latlng

        $this->db->query($query);
        $this->db->bind('nama_divisi', $data['nama_divisi']);
        $this->db->bind('nama_ketua', $data['nama_ketua']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('id_divisi', $data['id_divisi']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    // menghapus data kajian berdasarkan id_kajian di table tb_kajian
    public function hapusData($id)
    {

        // $query = "SELECT * FROM tb_"

        // $data = $this->getIdUsulan($id);
        // $id_usulan = $data['id_usulan'];
        // if ($data != false) {
        //     $this->hapusLampiran($id_usulan);
        //     $this->hapusRiwayat($id_usulan);
        //     $this->hapusUsulan($id_usulan);
        // }
        $this->db->query("SELECT *");
        $this->db->bind('id_divisi', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // mengambil id_usulan jika ada
    public function getIdUsulan($id)
    {
        $this->db->query('SELECT id_usulan FROM tb_usulan WHERE id_kajian = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function hapusUsulan($id)
    {
        $this->db->query("DELETE FROM tb_usulan WHERE id_usulan = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    // menghapus data lampiran yg foreign key dengan tb usulan
    public function hapusLampiran($id)
    {
        $this->db->query("DELETE FROM tb_lampiran WHERE id_usulan = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    // menghapus data lampiran yg foreign key dengan tb usulan
    public function hapusKajian($id)
    {
        $this->db->query("DELETE FROM tb_kajian WHERE id_usulan = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
    }

    public function hapusRiwayat($id)
    {
        $this->db->query("DELETE FROM tb_riwayat WHERE id_usulan = :id");
        $this->db->bind('id', $id);
        $this->db->execute();
    }
}
