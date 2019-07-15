<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/30/2019
 * Time: 9:17 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MRekomendasi_pengajuan extends CI_Model{
    //bendahara
    public function read_dataRekomendasi()
    {
        $sql = $this->db->query("SELECT * FROM rekomendasi_pengaju_kredit");
        return $sql;
    }
    //ketua
    public function read_Rekomendasi()
    {
        $sql = $this->db->query("SELECT * FROM rekomendasi_pengaju_kredit");
        return $sql;
    }
    public function insertRekomendasi($id_rekomendasi){
        $date = date("Y-m-d");
        $this->db->insert('rekomendasi_pengaju_kredit', array('keterangan_rekomen'=>$date, 'id_rekomendasi' => $id_rekomendasi));
        return $this->db->affected_rows();
    }
}