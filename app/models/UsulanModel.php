<?php

class UsulanModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   // mangambil seluruh data kajian dari table tb_kajian
   public function tampilDaftarUsulan()
   {
      $this->db->query('SELECT tb_kajian.*, tb_usulan.* FROM tb_kajian, tb_usulan WHERE tb_kajian.id_kajian = tb_usulan.id_kajian AND tb_usulan.status = "diterima"');

      return $this->db->resultSet();
   }

   public function updateData($data)
   {
      // kordinat
      $kordinat = $data['lat'] . '@' . $data['long'];
      $query = "UPDATE tb_kajian SET 
            tanggal_upload = :tanggal_upload, latlng = :latlng, status = :status              
            WHERE id_kajian = :id_kajian";

      $this->db->query($query);
      $this->db->bind('id_kajian', $data['id_kajian']);
      $times = time() + (60 * 60 * 8) + 60;
      $this->db->bind('tanggal_upload', gmdate('Y-m-d H:i:s', $times));
      $this->db->bind('latlng', $kordinat);
      $this->db->bind('status', "publish");

      $this->db->execute();
      // source methode ubahStatusUsulan
      $this->ubahStatusUsulan($data['id_usulan']);
      return $this->db->rowCount();
   }

   // mengubah status usulan ke publish apabila admin telah melakukan konfirmasi
   public function ubahStatusUsulan($id)
   {
      $query = 'UPDATE tb_usulan SET status = "publish" WHERE id_usulan = :id_usulan';
      $this->db->query($query);
      $this->db->bind('id_usulan', $id);
      $this->db->execute();
   }
}
