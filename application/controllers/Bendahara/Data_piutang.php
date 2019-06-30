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
    public function edit_dataPiutang($id_anggota)
    {
        $nama_anggota = $this->input->post('nama_anggota');
        $sisa_utang_di_koperasi = $this->input->post('sisa_utang_di_koperasi');
        $total_lama_angsuran = $this->input->post('total_lama_angsuran');
        $data = array(
            'nama_anggota'=> $nama_anggota,
            'sisa_utang_di_koperasi'  => $sisa_utang_di_koperasi,
            'total_lama_angsuran'=> $total_lama_angsuran
        );

        $update = $this->MPemohon_kredit->update_dataPiutang( $id_anggota, $data);
        if ($update > 0){
            redirect('Bendahara/Data_piutang');
        }

    }
}

?>