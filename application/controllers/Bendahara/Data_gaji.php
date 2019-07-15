<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_gaji extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MAnggota");
    }

    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $anggota ['sql1'] = $this->MAnggota->read_dataAnggota();
        $this->load->view('bendahara/body/data_gaji', $anggota);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function edit_dataGaji($id_anggota)
    {
        $nama_anggota = $this->input->post('nama_anggota');
        $jml_gaji = $this->input->post('jml_gaji');

        $data = array(
            'nama_anggota'=> $nama_anggota,
            'jml_gaji'  => $jml_gaji
        );

        $update = $this->MAnggota->update_dataGaji( $id_anggota, $data);
        if ($update > 0){
            $this->session->set_flashdata('pesan', 'updated');
            redirect('Bendahara/Data_gaji');
        }
        else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect('Bendahara/Data_gaji');
        }
    }
}

?>