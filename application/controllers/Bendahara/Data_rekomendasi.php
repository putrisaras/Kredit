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
        $this->load->model('MRekomendasi_pengajuan');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_dataRekomendasi();
        $this->load->view('bendahara/body/data_rekomendasi',$rekomendasi_pengaju_kredit);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
}

?>