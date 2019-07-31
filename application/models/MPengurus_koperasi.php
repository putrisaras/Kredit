<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 5/17/2019
 * Time: 9:35 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class MPengurus_koperasi extends CI_Model
{

    public function loginPengurus($username_pengurus, $password_pengurus)
    {
        return $this->db->get_where('pengurus_koperasi', array('username_pengurus' => $username_pengurus, 'password_pengurus' => $password_pengurus));
    }
    public function getProfilById($id_pengurus){
        return $this->db->get_where('pengurus_koperasi', array('id_pengurus' => $id_pengurus));
    }
    public function update_Profil($id_pengurus, $data)
    {
        $this->db->where('id_pengurus', $id_pengurus);
        $this->db->update('pengurus_koperasi', $data);
        return $this->db->affected_rows();
    }
}