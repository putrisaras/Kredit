<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 1/8/2019
 * Time: 5:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MAnggota extends CI_Model
{
    public function loginAnggota($username_anggota, $password_anggota)
    {
        return $this->db->get_where('anggota', array('username_anggota' => $username_anggota, 'password_anggota' => $password_anggota));
    }
    //read seluruh data dari tabel pemohon kredit
    public function read_dataAnggota()
    {
        $sql = $this->db->query("SELECT * FROM anggota");
        return $sql;
    }
//    public function read_dataAnggota()
//    {
//        return $this->db->get('anggota')->result();
//    }
    //read seluruh data dari tabel pemohon kredit
    public function fetchAnggota()
    {
        $this->db->select('anggota.*');
        $this->db->join('pengajuan_kredit', 'pengajuan_kredit.id_anggota = anggota.id_anggota', 'left');
        $this->db->where('pengajuan_kredit.id_persetujuan >', '1');
        $this->db->group_by('anggota.id_anggota');
        return $this->db->get('anggota');
    }

    public function select_Anggota()
    {
        $this->db->order_by('nama_anggota', 'ASC');
        return $this->db->get('anggota');
    }
    //View My Profil
    public function getProfilById($id_anggota){
        return $this->db->get_where('anggota', array('id_anggota' => $id_anggota));
    }
    //Insert di Bendahara
    public function create_dataAnggota($data)
    {
        $this->db->insert('anggota', $data);
        return $this->db->affected_rows();
    }
    //Update di Bendahara
    public function update_dataAnggota($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
        return $this->db->affected_rows();
    }
    //Update My Profil
    public function update_Profil($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
        return $this->db->affected_rows();
    }
    //Update gaji di Bendahara
    public function update_dataGaji($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
        return $this->db->affected_rows();
    }
    //update modal di Bendahara
    public function update_dataModal($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
        return $this->db->affected_rows();
    }
    //update piutang di Bendahara
    public function update_dataPiutang($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('anggota', $data);
        return $this->db->affected_rows();
    }
    //Delete di Bendahara
    public function delete_dataAnggota($id_anggota)
    {
        $hapus = $this->db->query("DELETE FROM anggota WHERE id_anggota = '$id_anggota'");
        return $hapus;
    }


}