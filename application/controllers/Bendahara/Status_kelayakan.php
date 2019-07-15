<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Status_kelayakan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MStatus_kelayakan");
    }

    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $status_kelayakan['sql1'] = $this->MStatus_kelayakan->read_dataStatus_kelayakan();
        $this->load->view('bendahara/body/status_kelayakan', $status_kelayakan);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function edit_StatusKelayakan($id_kelayakan)
    {
        $batas_atas = $this->input->post('batas_atas');
        $batas_bawah = $this->input->post('batas_bawah');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'batas_atas'=>  $batas_atas,
            'batas_bawah'  => $batas_bawah,
            'keterangan'=>  $keterangan
        );

        $update = $this->MStatus_kelayakan->update_StatusKelayakan( $id_kelayakan, $data);
        if ($update > 0){
            redirect('Bendahara/Status_kelayakan');
        }

    }
}

?>