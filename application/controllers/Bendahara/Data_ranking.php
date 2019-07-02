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
        $this->load->model('MPemohon_kredit', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
    }

    public function index($id_spk)
    {
        $data['pengajuan_kredit'] = $this->pengajuan->getAllPengajuan($id_spk);
        $data['pemohon_kredit'] = $this->anggota->read_dataPemohon_kredit();
        $this->load->view('bendahara/body/data_ranking', $data);
    }


}

?>