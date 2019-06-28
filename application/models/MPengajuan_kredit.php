<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 1/8/2019
 * Time: 5:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MPengajuan_kredit extends CI_Model
{
    public function read_dataPengajuan_kredit()
    {
        $sql = $this->db->query("SELECT * FROM pengajuan_kredit");
        return $sql;
    }
    //View pengajuan bendahara
    public function getAllPengajuan()
    {
        $this->db->select ('pengajuan_kredit.*, pemohon_kredit.*');
        $this->db->from ('pengajuan_kredit');
        $this->db->join ('pemohon_kredit','pemohon_kredit.Id_anggota = pengajuan_kredit.id_anggota' );
        $this->db->order_by ('pengajuan_kredit.id_anggota');
        return $this->db->get();
    }
    //View pengajuan anggota
    public function getPengajuanById($id_anggota){
        return $this->db->get_where('pengajuan_kredit', array('id_anggota' => $id_anggota));
    }
    public function tambahPengajuan($data)
    {
        $this->db->insert ('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }
    public function delete_dataPengajuan($id_pengajuan)
    {
        $hapus = $this->db->query("DELETE FROM pengajuan_kredit WHERE id_pengajuan = '$id_pengajuan'");
        return $hapus;
    }
    public function update_dataPengajuan($id_pengajuan, $data)
    {
        $this->db->select ('pengajuan_kredit.*, pemohon_kredit.*');
        $this->db->from ('pengajuan_kredit');
        $this->db->join ('pemohon_kredit','pemohon_kredit.Id_anggota = pengajuan_kredit.id_anggota' );
        $this->db->where ('id_pengajuan', $id_pengajuan);
        $this->db->update ('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }
}