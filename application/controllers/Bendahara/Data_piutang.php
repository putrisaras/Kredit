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
        $this->load->model("MAnggota");
    }

    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
        $anggota['sql1'] = $this->MAnggota->read_dataAnggota();
        $this->load->view('bendahara/body/data_piutang', $anggota);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
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

        $update = $this->MAnggota->update_dataPiutang( $id_anggota, $data);
        if ($update > 0){
            $this->session->set_flashdata('pesan', 'updated');
            redirect('Bendahara/Data_piutang');
        }
        else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect('Bendahara/Data_piutang');
        }

    }
}

?>