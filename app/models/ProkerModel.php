<?php

class ProkerModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // mangambil seluruh data kajian dari table tb_kajian
    public function tampilProker()
    {
        $this->db->query("SELECT tb_proker.id_proker, tb_proker.nama_proker, tb_divisi.nama_divisi FROM tb_proker, tb_divisi WHERE tb_proker.id_divisi = tb_divisi.id_divisi");
        return $this->db->resultSet();
    }

    // menampilkan detail kajian
    public function selectById($id)
    {
        $query = "SELECT * FROM tb_proker WHERE id_proker = :id_proker";
        $this->db->query($query);
        $this->db->bind('id_proker', $id);

        return $this->db->single();
    }

    // menampilkan daftar jenis kajian di form tambah kajian (insert_kajian.php)
    public function selectDivisi()
    {
        $this->db->query("SELECT * FROM tb_divisi");
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

        $panitia = "";
        if($data['panitia'] == "ya"){
            $panitia = "1";
        }else if($data['panitia'] == "tidak"){
            $panitia = "0";
        }

        $query = "INSERT INTO tb_proker 
            (id_divisi, nama_proker, bobot, kepanitian) 
                VALUES 
            (:id_divisi, :nama_proker, :bobot, :kepanitian)";

        $this->db->query($query);

        $this->db->bind('id_divisi', $data['id_divisi']);
        $this->db->bind('nama_proker', $data['nama_proker']);
        $this->db->bind('bobot', $data['bobot']);
        $this->db->bind('kepanitian', $panitia);


        $this->db->execute();

        return $this->db->rowCount();
    }

    // Mengubah data kajian ditable tb_kajian
    public function editData($data)
    {

        $query = "UPDATE tb_proker SET
            id_divisi     = :id_divisi,
            nama_proker    = :nama_proker,
            bobot          = :bobot     
            WHERE id_proker = :id_proker";
        // judul_kajian    = :judul_kajian 
        // pemateri        = :pemateri, 
        // tanggal_upload  = :tanggal_upload,
        // gambar          = :gambar,
        // lokasi          = :lokasi,
        // latlng          = :latlng

        $this->db->query($query);
        $this->db->bind('id_divisi', $data['id_divisi']);
        $this->db->bind('nama_proker', $data['nama_proker']);
        $this->db->bind('bobot', $data['bobot']);
        $this->db->bind('id_proker', $data['id_proker']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    // menghapus data kajian berdasarkan id_kajian di table tb_kajian
    public function hapusData($id)
    {
        $this->db->query("DELETE FROM tb_proker WHERE id_proker = :id_proker");
        $this->db->bind('id_proker', $id);
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
