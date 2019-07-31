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
        $this->db->select('rekomendasi_pengaju_kredit.*');
        $this->db->from('rekomendasi_pengaju_kredit');
        $this->db->order_by('id_rekomendasi', 'DESC');
        return $this->db->get();
    }
    //ketua
    public function read_Rekomendasi()
    {
        $this->db->join('pengajuan_kredit', 'pengajuan_kredit.id_rekomendasi = rekomendasi_pengaju_kredit.id_rekomendasi');
        $this->db->group_by('pengajuan_kredit.id_rekomendasi');
        return $this->db->get_where('rekomendasi_pengaju_kredit', array('id_persetujuan ='=>'1'));
    }
    public function read_historyRekomendasi()
    {
        {
            $this->db->join('pengajuan_kredit', 'pengajuan_kredit.id_rekomendasi = rekomendasi_pengaju_kredit.id_rekomendasi');
            $this->db->group_by('pengajuan_kredit.id_rekomendasi');
            $this->db->order_by('rekomendasi_pengaju_kredit.id_rekomendasi', 'DESC');
            return $this->db->get_where('rekomendasi_pengaju_kredit', array('id_persetujuan > '=>'1'));
        }
    }
    public function insertRekomendasi($id_rekomendasi){
        $date = date("Y-m-d");
        $this->db->insert('rekomendasi_pengaju_kredit', array('keterangan_rekomen'=>$date, 'id_rekomendasi' => $id_rekomendasi));
        return $this->db->affected_rows();
    }
    public function notif_setuju(){
        $this->db->where('notif_setuju', '0');
        return $this->db->count_all_results('rekomendasi_pengaju_kredit');
    }

    public function refresh(){
        $this->db->where('notif_setuju','0');
        $this->db->set('notif_setuju','1');
        return $this->db->update('rekomendasi_pengaju_kredit');
    }
}