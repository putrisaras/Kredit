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
    public function loginAnggota($Username_anggota, $Password_anggota)
    {
        return $this->db->get_where('pemohon_kredit', array('Username_anggota' => $Username_anggota, 'Password_anggota' => $Password_anggota));
    }
    public function read_dataPemohon_kredit()
    {
        $sql = $this->db->query("SELECT * FROM pemohon_kredit");
        return $sql;
    }

    public function create_dataAnggota($data)
    {
        $this->db->insert('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function update_dataAnggota($Id_anggota, $data)
    {
        $this->db->where('Id_anggota', $Id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function update_dataGaji($Id_anggota, $data)
    {
        $this->db->where('Id_anggota', $Id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function update_dataModal($Id_anggota, $data)
    {
        $this->db->where('Id_anggota', $Id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

    public function delete_dataAnggota($Id_anggota)
    {
        $hapus = $this->db->query("DELETE FROM pemohon_kredit WHERE Id_anggota = '$Id_anggota'");
        return $hapus;
    }

    public function update_dataPiutang($Id_anggota, $data)
    {
        $this->db->where('Id_anggota', $Id_anggota);
        $this->db->update('pemohon_kredit', $data);
        return $this->db->affected_rows();
    }

}