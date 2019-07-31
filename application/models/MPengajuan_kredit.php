<?php
/**
 * Created by PhpStorm.
 * User: Us
 * Date: 1/8/2019
 * Time: 5:43 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MPengajuan_kredit extends CI_Model
{
    public function read_dataPengajuan_kredit()
    {
        $sql = $this->db->query("SELECT * FROM pengajuan_kredit");
        return $sql;
    }

    //View pengajuan bendahara
    public function getPengajuan()
    {
        $this->db->select('pengajuan_kredit.*, anggota.*, status_kelayakan.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->join('status_kelayakan', 'status_kelayakan.Id_kelayakan = pengajuan_kredit.id_kelayakan');
        $this->db->where('id_spk', '');
        $this->db->order_by('pengajuan_kredit.id_anggota');
        return $this->db->get();
    }

    //view pengajuan bendahara
    public function getAllPengajuan($id_spk)
    {
        $this->db->select('pengajuan_kredit.*, anggota.*, status_kelayakan.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->join('status_kelayakan', 'status_kelayakan.Id_kelayakan = pengajuan_kredit.id_kelayakan');
        if ($id_spk != null) {
            $this->db->order_by('nilai_preferensi', 'DESC');
            $this->db->where('id_spk', $id_spk);
        } else {
            $this->db->order_by('nilai_preferensi', 'DESC');
            $this->db->where('id_spk', '');
        }
        return $this->db->get();
    }

    public function getHistoryPengajuan($id_spk)
    {
        $this->db->select('pengajuan_kredit.*, anggota.*, status_kelayakan.*, status_persetujuan.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('status_persetujuan', 'status_persetujuan.Id_persetujuan = pengajuan_kredit.id_persetujuan');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->join('status_kelayakan', 'status_kelayakan.Id_kelayakan = pengajuan_kredit.id_kelayakan');
        if ($id_spk != null) {
            $this->db->order_by('nilai_preferensi', 'DESC');
            $this->db->where('id_spk', $id_spk);
        } else {
            $this->db->order_by('nilai_preferensi', 'DESC');
            $this->db->where('id_spk', '');
        }
        return $this->db->get();
    }
    public function getPengajuanById($id_anggota)
    {
        $this->db->select('pengajuan_kredit.*, status_persetujuan.*, anggota.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('status_persetujuan', 'status_persetujuan.Id_persetujuan = pengajuan_kredit.id_persetujuan');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        if ($id_anggota != null) {
            $this->db->order_by('id_pengajuan', 'DESC');
            $this->db->where('pengajuan_kredit.id_anggota', $id_anggota);
        }


        return $this->db->get();
    }

      //BENDAHARA
    public function getAllRekomendasi($id_rekomendasi)
    {
        $this->db->select('pengajuan_kredit.*,  anggota.*, status_kelayakan.*, status_persetujuan.*, rekomendasi_pengaju_kredit.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('rekomendasi_pengaju_kredit', 'rekomendasi_pengaju_kredit.id_rekomendasi = pengajuan_kredit.id_rekomendasi');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->join('status_persetujuan', 'status_persetujuan.Id_persetujuan = pengajuan_kredit.id_persetujuan');
        $this->db->join('status_kelayakan', 'status_kelayakan.Id_kelayakan = pengajuan_kredit.id_kelayakan');
        if ($id_rekomendasi != null) {
            $this->db->order_by('ranking', 'ASC');
            $this->db->where('pengajuan_kredit.id_rekomendasi', $id_rekomendasi);
        } else {
            $this->db->order_by('ranking', 'ASC');
            $this->db->where('pengajuan_kredit.id_rekomendasi', '');
        }
        return $this->db->get();

    }
    //Ketua
    public function getHitoryPersetujuan($id_rekomendasi)
    {
        $this->db->select('pengajuan_kredit.*,  anggota.*, status_kelayakan.*, status_persetujuan.*, rekomendasi_pengaju_kredit.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('rekomendasi_pengaju_kredit', 'rekomendasi_pengaju_kredit.id_rekomendasi = pengajuan_kredit.id_rekomendasi');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->join('status_persetujuan', 'status_persetujuan.Id_persetujuan = pengajuan_kredit.id_persetujuan');
        $this->db->join('status_kelayakan', 'status_kelayakan.Id_kelayakan = pengajuan_kredit.id_kelayakan');
        if ($id_rekomendasi != null) {
            $this->db->order_by('ranking', 'ASC');
            $this->db->where('pengajuan_kredit.id_rekomendasi', $id_rekomendasi);
        } else {
            $this->db->order_by('ranking', 'ASC');
            $this->db->where('pengajuan_kredit.id_rekomendasi', '');
        }
        return $this->db->get();

    }

    //KETUA
    public function getAllPersetujuan($id_rekomendasi)
    {
        $this->db->select('pengajuan_kredit.*,  anggota.*, status_kelayakan.*, rekomendasi_pengaju_kredit.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('rekomendasi_pengaju_kredit', 'rekomendasi_pengaju_kredit.id_rekomendasi = pengajuan_kredit.id_rekomendasi');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->join('status_kelayakan', 'status_kelayakan.Id_kelayakan = pengajuan_kredit.id_kelayakan');
        if ($id_rekomendasi != null) {
            $this->db->order_by('ranking', 'ASC');
            $this->db->where('pengajuan_kredit.id_rekomendasi', $id_rekomendasi);
        } else {
            $this->db->order_by('ranking', 'ASC');
            $this->db->where('pengajuan_kredit.id_rekomendasi', '');
        }
        return $this->db->get();

    }

    //get data pengajuan di bendahara
    public function getPengajuanKredit()
    {
        $this->db->select_max('anggota.jml_modal', 'jml_modal');
        $this->db->select_min('jml_kredit');
        $this->db->select_min('lama_angsuran');
        $this->db->select_max('anggota.jml_gaji', 'jml_gaji');
        $this->db->select_min('anggota.sisa_utang_di_koperasi', 'sisa_utangKoprasi');
        $this->db->select_min('sisa_utang_di_tempat_lain', 'sisa_utang');
        $this->db->from('pengajuan_kredit');
        $this->db->join('anggota', 'pengajuan_kredit.id_anggota = anggota.id_anggota');
        return $this->db->get();
    }
//    //Add pengajuan bendahara
//    public function tambah_dataPengajuan($data)
//    {
//        $this->db->insert('pengajuan_kredit', $data);
//        return $this->db->affected_rows();
//    }

    //Add pengajuan anggota
    public function tambahPengajuan($data)
    {
        $this->db->insert('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }

    //edit pengajuan di bendahara
    public function update_dataPengajuan($id_pengajuan, $data)
    {
        $this->db->select('pengajuan_kredit.*, anggota.*');
        $this->db->from('pengajuan_kredit');
        $this->db->join('anggota', 'anggota.Id_anggota = pengajuan_kredit.id_anggota');
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->update('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }

    //update data Pengajuan bendahara
    public function updateDataPengajuan($idPengajuan, $data)
    {
        $this->db->where('id_pengajuan', $idPengajuan);
        $this->db->update('pengajuan_kredit', $data);
        return $this->db->affected_rows();
    }

    //delete pengajuan di bendahara
    public function delete_dataPengajuan($id_pengajuan)
    {
        $hapus = $this->db->query("DELETE FROM pengajuan_kredit WHERE id_pengajuan = '$id_pengajuan'");
        return $hapus;
    }


    public function fetchPengajuan($id_anggota)
    {
        $where = "id_persetujuan < 2";
        $this->db->order_by('id_pengajuan', 'DESC');
        $this->db->where('id_anggota',$id_anggota);
        $this->db->where($where);
        $this->db->limit(1);
        return $this->db->get('pengajuan_kredit');
    }
    public function notif(){
        $this->db->where('notif', '0');
        return $this->db->count_all_results('pengajuan_kredit');
    }

    public function refresh(){
        $this->db->where('notif','0');
        $this->db->set('notif','1');
        return $this->db->update('pengajuan_kredit');
    }
    public function notif_persetujuan(){
        $this->db->where('notif_persetujuan', '0');
        return $this->db->count_all_results('pengajuan_kredit');
    }

    public function refresh_persetujuan(){
        $this->db->where('notif_persetujuan','0');
        $this->db->set('notif_persetujuan','1');
        return $this->db->update('pengajuan_kredit');
    }
    public function notif_anggota(){
        $this->db->where('notif_anggota', '0');
        return $this->db->count_all_results('pengajuan_kredit');
    }
    public function refresh_anggota(){
        $this->db->where('notif_anggota','0');
        $this->db->set('notif_anggota','1');
        return $this->db->update('pengajuan_kredit');
    }
}