<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_modal extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MPemohon_kredit");
    }

    public function index(){
        $pemohon_kredit['sql1'] = $this->MPemohon_kredit->read_dataPemohon_kredit();
        $this->load->view('bendahara/body/data_modal', $pemohon_kredit);
    }
    public function edit_dataModal($Id_anggota)
    {
        $Nama_anggota = $this->input->post('Nama_anggota');
        $Jlm_modal = $this->input->post('Jlm_modal');

        $data = array(
            'Nama_anggota'=> $Nama_anggota,
            'Jlm_modal'  => $Jlm_modal
        );

        $update = $this->MPemohon_kredit->update_dataModal( $Id_anggota, $data);
        if ($update > 0){
            redirect('Bendahara/Data_modal');
        }

    }
}

?>