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
        $this->db->select('pengajuan_kredit.*, pemohon_kredit.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('pemohon_kredit', 'pemohon_kredit.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->order_by('pengajuan_kredit.id_anggota');
        return $this->db->get();
    }

    //View pengajuan anggota
    public function getPengajuanById($id_anggota)
    {
        return $this->db->get_where('pengajuan_kredit', array('id_anggota' => $id_anggota));
    }

    public function tambahPengajuan($data)
    {
        $this->db->insert('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }

    public function delete_dataPengajuan($id_pengajuan)
    {
        $hapus = $this->db->query("DELETE FROM pengajuan_kredit WHERE id_pengajuan = '$id_pengajuan'");
        return $hapus;
    }

    public function update_dataPengajuan($id_pengajuan, $data)
    {
        $this->db->select('pengajuan_kredit.*, pemohon_kredit.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('pemohon_kredit', 'pemohon_kredit.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }

    public function getPengajuanKredit()
    {
        $this->db->select_max('pemohon_kredit.jml_modal', 'jml_modal');
        $this->db->select_min('jml_kredit');
        $this->db->select_min('lama_angsuran');
        $this->db->select_max('pemohon_kredit.jml_gaji', 'jml_gaji');
        $this->db->select_min('pemohon_kredit.sisa_utang_di_koperasi', 'sisa_utangKoprasi');
        $this->db->select_min('sisa_utang_di_tempat_lain', 'sisa_utang');
        $this->db->from('pengajuan_kredit');
        $this->db->join('pemohon_kredit', 'pengajuan_kredit.id_anggota = pemohon_kredit.id_anggota');
        return $this->db->get();
    }

    public function updateDataPengajuan($idPengajuan, $data)
    {
        $this->db->where('id_pengajuan', $idPengajuan);
        $this->db->update('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }
}