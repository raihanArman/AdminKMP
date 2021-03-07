<?php

class HapusOtomatisModel extends Database
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // menampilkan semua id_kajian dan tanggal upload
   public function daftarHapusOtomatis()
   {
      $query = "SELECT id_kajian, tanggal_upload FROM tb_kajian WHERE status = 'publish'";
      $this->db->query($query);
      $this->db->execute();

      return $this->db->resultSet();
   }


   public function hapusOtomatis()
   {
      $data = $this->daftarHapusOtomatis();
      foreach ($data as $daftarHapus) {
         $tanggal_upload = $daftarHapus['tanggal_upload'];
         $id_kajian = $daftarHapus['id_kajian'];
         // query menghitung selisih
         $query = "SELECT id_kajian, TIMEDIFF(now(), '$tanggal_upload') as selisih from tb_kajian where id_kajian = :id";
         $this->db->query($query);
         $this->db->bind('id', $id_kajian);
         $this->db->execute();
         $data = $this->db->single();
         $selisih = $data['selisih'];
         $selisih = explode(':', $selisih);
         // menghapus data jika telah melewati 3 hari
         if ($selisih[0] >= 72) {
            $this->hapusData($id_kajian);
         }
      }
   }

   // menghapus data kajian berdasarkan id_kajian di table tb_kajian
   public function hapusData($id)
   {
      $data = $this->getIdUsulan($id);
      $id_usulan = $data['id_usulan'];
      if ($data != false) {
         $this->hapusLampiran($id_usulan);
         $this->hapusRiwayat($id_usulan);
         $this->hapusUsulan($id_usulan);
      }
      $this->db->query("DELETE FROM tb_kajian WHERE id_kajian = :id_kajian");
      $this->db->bind('id_kajian', $id);
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
