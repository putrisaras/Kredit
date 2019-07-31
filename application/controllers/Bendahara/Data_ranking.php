<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ranking extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSpk');
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
        $this->load->model('MRekomendasi_pengajuan');
        $this->load->library('pdf');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $spk['sql1'] = $this->MSpk->read_dataSpk();
        $this->load->view('bendahara/body/data_ranking', $spk);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_detailRanking($id_spk)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['pengajuan_kredit'] = $this->pengajuan->getAllPengajuan($id_spk);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('bendahara/body/detail_ranking', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function updateRekomendasi()
    {
        $data = $this->input->post('ids');
        $data = json_decode($data);
        $id_persetujuan = 0 ;
        $id_rekomendasi = date("YmdHis");

        foreach ($data as $d) {
            $data = array(
//                    'id_rekomendasi' => $id_rekomendasi,
                'id_persetujuan' => $id_persetujuan,
                'ranking'        => $d->rank,
            );

            if ($d->status) {
//                    $id_rekomendasi
                $data['id_rekomendasi'] = $id_rekomendasi;
                $data['id_persetujuan'] = 1;
            } else {
                $data['id_rekomendasi'] = 1;
                $data['id_persetujuan'] = 3;
            }

            $this->pengajuan->updateDataPengajuan($d->id, $data);
        }

        $this->MRekomendasi_pengajuan->insertRekomendasi($id_rekomendasi);

        redirect(base_url() . "Bendahara/Data_ranking/v_spk");


    }

    public function tampildata()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $rekomendasi = $this->input->post('rekomendasi');
        $coba = 0;
        foreach($rekomendasi as $key => $val ) {
            if (isset($val)){
                echo $val;
            } else {
                echo "0 ";
            }

            echo "<br>";

        }

    }
//    HISTORY RANKING
    public function v_spk(){
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
//    DATA REKOMENDASI
    public function v_rekomendasi()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $this->pengajuan->refresh_persetujuan();
            $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_dataRekomendasi();
            $this->load->view('bendahara/body/data_rekomendasi', $rekomendasi_pengaju_kredit);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }

    public function v_detailRekomendasi($id_rekomendasi)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['pengajuan_kredit'] = $this->pengajuan->getAllRekomendasi($id_rekomendasi);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('bendahara/body/detail_rekomendasi', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }

    public function pdfGenerate($id_rekomendasi)
    {
        $data['dataRekomendasi'] = $this->pengajuan->getAllRekomendasi($id_rekomendasi);
        $this->pdf->generate('bendahara/report/lap_persetujuan', $data, 'laporan_persetujuan');
    }

    public function notif_persetujuan()
    {
        $notif_persetujuan = $this->pengajuan->notif_persetujuan();
        echo json_encode($notif_persetujuan);
    }
}

?>