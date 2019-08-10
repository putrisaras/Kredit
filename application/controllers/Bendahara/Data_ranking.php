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
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
        $spk['sql1'] = $this->MSpk->read_dataSpk();
        $this->load->view('bendahara/body/data_ranking', $spk);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_detailRanking($id_spk)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
            $data['pengajuan_kredit'] = $this->pengajuan->getAllPengajuan($id_spk);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('bendahara/body/detail_ranking', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function updateRekomendasi()
    {
        $data   = $this->pengajuan->cariKetua($this->session->userdata('id_pengurus'));
        $result = $data->result();
        $email_pengurus = $result[0]->email_pengurus;

        $data = $this->input->post('ids');
        $data = json_decode($data);
        $id_pengurus = 0 ;
        $id_persetujuan = 0 ;
        $notif_anggota = 0 ;
        $id_rekomendasi = date("YmdHis");

        foreach ($data as $d) {
            $data = array(
//                    'id_rekomendasi' => $id_rekomendasi,
                'id_pengurus' => $id_pengurus,
                'id_persetujuan' => $id_persetujuan,
                'notif_anggota' => $notif_anggota,
                'ranking'        => $d->rank,
            );

            if ($d->status) {
//                    $id_rekomendasi
                $data['id_rekomendasi'] = $id_rekomendasi;
                $data['id_persetujuan'] = 1;
                $data['id_pengurus'] = 1;
                $data['notif_anggota'] = 1;
            } else {
                $data['id_rekomendasi'] = 1;
                $data['id_persetujuan'] = 3;
                $data['id_pengurus'] = 2;
                $data['notif_anggota'] = 0;

                $anggota = $this->pengajuan->emailAnggota($d->anggota);
                $result  = $anggota->result();
                $email   = $result[0]->email_anggota;

                //send email
                $this->load->library('email');
                $config = array();
                $config['protocol']  = 'smtp';
                $config['smtp_host'] = 'smtp.hostinger.co.id';
                $config['smtp_user'] = 'tugasakhir.mi@rishamitha.com';
                $config['smtp_pass'] = 'Jsli6iiZTXk3';
                $config['smtp_port'] = 587;
                $this->email->initialize($config);

                $this->email->from('tugasakhir.mi@rishamitha.com', 'Koperasi Jnana Partha');
                $this->email->to($email);
                $this->email->subject('Halo, ada persetujuan pengajuan baru');
                $this->email->message('Silahkan cek website Koperasi Jnana Partha untuk melihat persetujuan pengajuan baru');
                $this->email->send(FALSE);
            }

            $this->pengajuan->updateDataPengajuan($d->id, $data);

        }

        $insert = $this->MRekomendasi_pengajuan->insertRekomendasi($id_rekomendasi);
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.hostinger.co.id';
        $config['smtp_user'] = 'tugasakhir.mi@rishamitha.com';
        $config['smtp_pass'] = 'Jsli6iiZTXk3';
        $config['smtp_port'] = 587;
        $this->email->initialize($config);

        $this->email->from('tugasakhir.mi@rishamitha.com', 'Koperasi Jnana Partha');
        $this->email->to($email_pengurus);
        $this->email->subject('Halo ada rekomendasi pengaju baru');
        $this->email->message('Silahkan cek website Koperasi Jnana Partha untuk melihat rekomendasi pengaju baru');
        $this->email->send(FALSE);
        if ($insert > 0){
            $this->session->set_flashdata('pesan', 'hitung');
            redirect(base_url() . "Bendahara/Data_ranking/v_spk");
        } else {
            $this->session->set_flashdata('pesan', 'gagalhitung');
            redirect('Bendahara/Data_ranking/v_detailRanking');
        }


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
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
            $spk['sql1'] = $this->MSpk->history_dataSpk();
            $this->load->view('bendahara/body/history_spk', $spk);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_historyRanking($id_spk)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
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
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
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
        $this->pdf->generate('bendahara/report/lap_persetujuan', $data, 'persetujuan rekomendasi');
    }

    public function notif_persetujuan()
    {
        $notif_persetujuan = $this->pengajuan->notif_persetujuan();
        echo json_encode($notif_persetujuan);
    }
}

?>