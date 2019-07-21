<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_rekomendasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
        $this->load->model('MRekomendasi_pengajuan');
        $this->load->library('pdf');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_dataRekomendasi();
        $this->load->view('bendahara/body/data_rekomendasi',$rekomendasi_pengaju_kredit);
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
    public function pdfGenerate($id_rekomendasi){
        $data['dataRekomendasi'] = $this->pengajuan->getAllRekomendasi($id_rekomendasi);
        $this->pdf->generate('bendahara/report/lap_persetujuan', $data, 'laporan_persetujuan');
    }
}

?>