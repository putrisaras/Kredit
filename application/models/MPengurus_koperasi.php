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
}