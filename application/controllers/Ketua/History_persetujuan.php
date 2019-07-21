<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class History_persetujuan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MRekomendasi_pengajuan');
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_dataRekomendasi();
            $this->load->view('ketua/body/history_persetujuan',$rekomendasi_pengaju_kredit);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_detailPersetujuan($id_rekomendasi)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['pengajuan_kredit'] = $this->pengajuan->getAllRekomendasi($id_rekomendasi);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('ketua/body/detail_persetujuan', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
}

?>