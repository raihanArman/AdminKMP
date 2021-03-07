<?php

class KepanitianModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // mangambil seluruh data kajian dari table tb_kajian
    public function tampilKepanitian()
    {
        $this->db->query("SELECT tb_kepanitian.*, tb_proker.nama_proker FROM tb_kepanitian, tb_proker WHERE tb_kepanitian.id_proker = tb_proker.id_proker");
        return $this->db->resultSet();
    }

    // menampilkan detail kajian
    public function selectById($id)
    {
        $query = "SELECT * FROM tb_kepanitian WHERE id_kepanitian = :id_kepanitian";
        $this->db->query($query);
        $this->db->bind('id_kepanitian', $id);

        return $this->db->single();
    }

    // menampilkan daftar jenis kajian di form tambah kajian (insert_kajian.php)
    public function selectProker()
    {
        $this->db->query("SELECT * FROM tb_proker WHERE kepanitian = '1'");
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
        $query = "INSERT INTO tb_kepanitian
            (id_proker, nama, password) 
                VALUES 
            (:id_proker, :nama, :password)";

        $this->db->query($query);

        $this->db->bind('id_proker', $data['id_proker']);
        $this->db->bind('nama', $data['panitia']);
        $this->db->bind('password', $data['password']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Mengubah data kajian ditable tb_kajian
    public function editData($data)
    {

        $query = "UPDATE tb_kepanitian SET
            id_proker     = :id_proker,
            nama    = :nama      
            WHERE id_kepanitian = :id_kepanitian";
        // judul_kajian    = :judul_kajian 
        // pemateri        = :pemateri, 
        // tanggal_upload  = :tanggal_upload,
        // gambar          = :gambar,
        // lokasi          = :lokasi,
        // latlng          = :latlng

        $this->db->query($query);
        $this->db->bind('id_proker', $data['id_proker']);
        $this->db->bind('nama', $data['panitia']);
        $this->db->bind('id_kepanitian', $data['id_kepanitian']);
        

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
        $this->db->query("DELETE FROM tb_kepanitian WHERE id_kepanitian = :id_kepanitian");
        $this->db->bind('id_kepanitian', $id);
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
