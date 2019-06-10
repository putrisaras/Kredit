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

    public function loginPengurus($Username_pengurus, $Password_pengurus)
    {
        return $this->db->get_where('pengurus_koperasi', array('Username_pengurus' => $Username_pengurus, 'Password_pengurus' => $Password_pengurus));
    }
}