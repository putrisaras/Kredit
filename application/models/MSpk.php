<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 6/30/2019
 * Time: 9:17 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MSpk extends CI_Model{
    //read history spk di bendahara
    public function history_dataSpk()
    {
        $this->db->join('pengajuan_kredit', 'pengajuan_kredit.id_spk = spk.id_spk');
        $this->db->group_by('pengajuan_kredit.id_spk');
        $this->db->order_by('spk.id_spk', 'DESC');
        return $this->db->get_where('spk', array('id_rekomendasi >'=>'0'));
    }
    public function read_dataSpk()
    {
        $this->db->join('pengajuan_kredit', 'pengajuan_kredit.id_spk = spk.id_spk');
        $this->db->group_by('pengajuan_kredit.id_spk');
        return $this->db->get_where('spk', array('id_rekomendasi '=>''));
    }
    //insert spk pengajuan di bendahara
    public function insertDataSPK($idSpk){
        $date = date("Y-m-d");
        $this->db->insert('spk', array('keterangan_spk'=>$date, 'id_spk' => $idSpk));
        return $this->db->affected_rows();
    }

}