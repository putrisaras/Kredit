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
        $this->load->model("MAnggota");
    }

    public function index(){
        $anggota['sql1'] = $this->MAnggota->read_dataAnggota();
        $this->load->view('bendahara/body/data_modal', $anggota);
    }
    public function edit_dataModal($id_anggota)
    {
        $nama_anggota = $this->input->post('nama_anggota');
        $jml_modal = $this->input->post('jml_modal');

        $data = array(
            'nama_anggota'=> $nama_anggota,
            'jml_modal'  => $jml_modal
        );

        $update = $this->MAnggota->update_dataModal( $id_anggota, $data);
        if ($update > 0){
            redirect('Bendahara/Data_modal');
        }

    }
}

?>