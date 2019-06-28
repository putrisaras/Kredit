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
        $this->load->model("MPemohon_kredit");
    }

    public function index(){
        $pemohon_kredit['sql1'] = $this->MPemohon_kredit->read_dataPemohon_kredit();
        $this->load->view('bendahara/body/data_gaji', $pemohon_kredit);
    }
    public function edit_dataGaji($id_anggota)
    {
        $nama_anggota = $this->input->post('nama_anggota');
        $jml_gaji = $this->input->post('jml_gaji');

        $data = array(
            'nama_anggota'=> $nama_anggota,
            'jml_gaji'  => $jml_gaji
        );

        $update = $this->MPemohon_kredit->update_dataGaji( $id_anggota, $data);
        if ($update > 0){
            redirect('Bendahara/Data_gaji');
        }

    }
}

?>