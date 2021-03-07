<?php

class PertemuanModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // mangambil seluruh data kajian dari table tb_kajian
    public function tampilPertemuan()
    {
        $this->db->query("SELECT  tb_pertemuan.id_pertemuan, tb_pertemuan.pertemuan_ke, tb_pertemuan.nama_pertemuan, tb_proker.nama_proker, tb_divisi.nama_divisi, tb_pertemuan.tanggal FROM tb_pertemuan, tb_proker, tb_divisi WHERE tb_pertemuan.id_proker = tb_proker.id_proker AND tb_proker.id_divisi = tb_divisi.id_divisi");
        return $this->db->resultSet();
    }

    // menampilkan detail kajian
    public function selectById($id)
    {
        $query = "SELECT * FROM tb_pertemuan WHERE id_pertemuan = :id_pertemuan";
        $this->db->query($query);
        $this->db->bind('id_pertemuan', $id);

        return $this->db->single();
    }

    // menampilkan daftar jenis kajian di form tambah kajian (insert_kajian.php)
    public function selectProker()
    {
        $this->db->query("SELECT * FROM tb_proker");
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
        $query = "INSERT INTO tb_pertemuan 
            (id_proker, pertemuan_ke, nama_pertemuan, tanggal, status) 
                VALUES 
            (:id_proker, :pertemuan_ke, :nama_pertemuan, :tanggal, :status)";

        $this->db->query($query);

        $this->db->bind('id_proker', $data['id_proker']);
        $this->db->bind('pertemuan_ke', $data['pertemuan_ke']);
        $this->db->bind('nama_pertemuan', $data['nama_pertemuan']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('status', '0');

        $this->db->execute();

        return $this->db->rowCount();
    }

    // Mengubah data kajian ditable tb_kajian
    public function editData($data)
    {

        $query = "UPDATE tb_pertemuan SET
            id_proker     = :id_proker,
            pertemuan_ke    = :pertemuan_ke,     
            nama_pertemuan    = :nama_pertemuan,
            tanggal    = :tanggal
            WHERE id_pertemuan = :id_pertemuan";
        // judul_kajian    = :judul_kajian 
        // pemateri        = :pemateri, 
        // tanggal_upload  = :tanggal_upload,
        // gambar          = :gambar,
        // lokasi          = :lokasi,
        // latlng          = :latlng

        $this->db->query($query);
        $this->db->bind('id_proker', $data['id_proker']);
        $this->db->bind('pertemuan_ke', $data['pertemuan_ke']);
        $this->db->bind('nama_pertemuan', $data['nama_pertemuan']);
        $this->db->bind('tanggal', $data['tanggal']);
        $this->db->bind('id_pertemuan', $data['id_pertemuan']);
        

        $this->db->execute();
        return $this->db->rowCount();
    }

    // menghapus data kajian berdasarkan id_kajian di table tb_kajian
    public function hapusData($id)
    {

        $this->db->query("SELECT * FROM tb_pertemuan WHERE id_pertemuan = $id");
        $pertemuan = $this->db->single();
        
        $this->db->query("SELECT * FROM tb_proker WHERE id_proker = $pertemuan[id_proker]");
        $proker = $this->db->single();

        if($proker['progress'] > 0){
            $this->db->query("SELECT IFNULL(COUNT(*), 0) as jml_pertemuan_selesai FROM tb_pertemuan WHERE id_proker = $pertemuan[id_proker] AND status = '1'");
            $rowSelesai = $this->db->single();

            $this->db->query("SELECT COUNT(*) as jml_pertemuan FROM tb_pertemuan WHERE id_proker = $pertemuan[id_proker]");
            $rowProker = $this->db->single();
            
            $progress =  $rowSelesai['jml_pertemuan_selesai']/ max($rowProker['jml_pertemuan'], 1);

            $this->db->query("UPDATE tb_proker SET progress = $progress WHERE id_proker = :id_proker");
            $this->db->bind('id_proker', $pertemuan['id_proker']);
            $this->db->execute();
        }
        

        $this->db->query("DELETE FROM tb_dokumentasi WHERE id_pertemuan = :id_pertemuan");
        $this->db->bind('id_pertemuan', $id);
        $this->db->execute();

        $this->db->query("DELETE FROM tb_pertemuan WHERE id_pertemuan = :id_pertemuan");
        $this->db->bind('id_pertemuan', $id);
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
