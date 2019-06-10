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
        $status_kelayakan['sql1'] = $this->MStatus_kelayakan->read_dataStatus_kelayakan();
        $this->load->view('bendahara/body/status_kelayakan', $status_kelayakan);
    }
    public function edit_StatusKelayakan($Id_kelayakan)
    {
        $Batas_atas = $this->input->post('Batas_atas');
        $Batas_bawah = $this->input->post('Batas_bawah');
        $Keterangan = $this->input->post('Keterangan');

        $data = array(
            'Batas_atas'=>  $Batas_atas,
            'Batas_bawah'  => $Batas_bawah,
            'Keterangan'=>  $Keterangan
        );

        $update = $this->MStatus_kelayakan->update_StatusKelayakan( $Id_kelayakan, $data);
        if ($update > 0){
            redirect('Bendahara/Status_kelayakan');
        }

    }
}

?>