<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MRekomendasi_pengajuan');
        $this->load->model('MStatus_persetujuan');
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $this->MRekomendasi_pengajuan->refresh();
        $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_Rekomendasi();
        $this->load->view('ketua/body/rekomendasi',$rekomendasi_pengaju_kredit);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_persetujuan($id_rekomendasi)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['pengajuan_kredit'] = $this->pengajuan->getAllPersetujuan($id_rekomendasi);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('ketua/body/data_persetujuan', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function persetujuan()
    {
        $data = $this->input->post('ids');
        $data = json_decode($data);
        $id_persetujuan = 'id_persetujuan' ;


        foreach ($data as $d) {
            $data = array(
                'id_persetujuan' => $id_persetujuan,
                'notif_persetujuan' => "0"
            );

            if ($d->status) {
                $data['id_persetujuan'] = 2;
            } else {
                $data['id_persetujuan'] = 3;

            }

            $this->pengajuan->updateDataPengajuan($d->id, $data);
        }

        redirect(base_url() . "Ketua/Rekomendasi/v_historyPersetujuan");
    }
    public function tampildata()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $persetujuan = $this->input->post('persetujuan');
        $coba = 0;
        foreach($persetujuan as $key => $val ) {
            if (isset($val)){
                echo $val;
            } else {
                echo "0 ";
            }

            echo "<br>";

        }

    }
    public function notif_setuju (){
        $notif_setuju = $this->MRekomendasi_pengajuan->notif_setuju();
        echo json_encode($notif_setuju);
    }

    public function v_historyPersetujuan(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_historyRekomendasi();
            $this->load->view('ketua/body/history_persetujuan',$rekomendasi_pengaju_kredit);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_detailPersetujuan($id_rekomendasi)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['pengajuan_kredit'] = $this->pengajuan->getHitoryPersetujuan($id_rekomendasi);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('ketua/body/detail_persetujuan', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
}

?>