<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 1/8/2019
 * Time: 5:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MPemohon_kredit extends CI_Model
{
    public function loginAnggota($username_anggota, $password_anggota)
    {
        return $this->db->get_where('pemohon_kredit', array('username_anggota' => $username_anggota, 'password_anggota' => $password_anggota));
    }
    public function read_dataPemohon_kredit()
    {
        $sql = $this->db->query("SELECT * FROM pemohon_kredit");
        return $sql;
    }
    //View My Profil
    public function getProfilById($id_anggota){
        return $this->db->get_where('pemohon_kredit', array('id_anggota' => $id_anggota));
    }
    public function create_dataAnggota($data)
    {
        $this->db->insert('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function update_dataAnggota($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }
    public function update_Profil($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function update_dataGaji($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function update_dataModal($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function delete_dataAnggota($id_anggota)
    {
        $hapus = $this->db->query("DELETE FROM pemohon_kredit WHERE id_anggota = '$id_anggota'");
        return $hapus;
    }

    public function update_dataPiutang($id_anggota, $data)
    {
        $this->db->where('id_anggota', $id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

}