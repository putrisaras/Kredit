<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_piutang extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MPemohon_kredit");
    }

    public function index(){
        $pemohon_kredit['sql1'] = $this->MPemohon_kredit->read_dataPemohon_kredit();
        $this->load->view('bendahara/body/data_piutang', $pemohon_kredit);
    }
    public function edit_dataPiutang($Id_anggota)
    {
        $Nama_anggota = $this->input->post('Nama_anggota');
        $Sisa_utang_di_koperasi = $this->input->post('Sisa_utang_di_koperasi');

        $data = array(
            'Nama_anggota'=> $Nama_anggota,
            'Sisa_utang_di_koperasi'  => $Sisa_utang_di_koperasi
        );

        $update = $this->MPemohon_kredit->update_dataPiutang( $Id_anggota, $data);
        if ($update > 0){
            redirect('Bendahara/Data_piutang');
        }

    }
}

?>