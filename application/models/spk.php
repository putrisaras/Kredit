<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/30/2019
 * Time: 9:17 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class spk extends CI_Model{

    public function insertDataSPK($idSpk){
        $date = date("Y-m-d");
        $this->db->insert('spk', array('keterangan_spk'=>$date, 'id_spk' => $idSpk));
        return $this->db->affected_rows();
    }

}