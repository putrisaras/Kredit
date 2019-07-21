<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class History_spk extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSpk');
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
        $this->load->model('MRekomendasi_pengajuan');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $spk['sql1'] = $this->MSpk->history_dataSpk();
            $this->load->view('bendahara/body/history_spk', $spk);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_historyRanking($id_spk)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['pengajuan_kredit'] = $this->pengajuan->getHistoryPengajuan($id_spk);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('bendahara/body/history_ranking', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
}

?>