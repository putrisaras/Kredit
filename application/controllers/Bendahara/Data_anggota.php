<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_anggota extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MPemohon_kredit");
    }

    public function index(){
        $pemohon_kredit['sql1'] = $this->MPemohon_kredit->read_dataPemohon_kredit();
        $this->load->view('bendahara/body/data_anggota', $pemohon_kredit);
    }
    public function tambah_dataAnggota()
    {
        $data = array(

            'Nama_anggota'=> $this->input->post('Nama_anggota'),
            'Username_anggota'  => $this->input->post('Username_anggota'),
            'Password_anggota'=> $this->input->post('Password_anggota'),
            'Jlm_gaji'=>  $this->input->post('Jlm_gaji'),
            'Alamat'  => $this->input->post('Alamat'),
            'No_telp'=> $this->input->post('No_telp'),
            'Jlm_modal' => "150000",
            'Jenis_kelamin'  => $this->input->post('Jenis_kelamin')
        );

        $this->MPemohon_kredit->create_dataAnggota($data);
        redirect('Bendahara/Data_anggota');
    }
    public function edit_dataAnggota($Id_anggota)
    {
        $Nama_anggota = $this->input->post('Nama_anggota');
        $Username_anggota = $this->input->post('Username_anggota');
        $Password_anggota = $this->input->post('Password_anggota');
        $Alamat = $this->input->post('Alamat');
        $No_telp = $this->input->post('No_telp');
        $Jenis_kelamin = $this->input->post('Jenis_kelamin');

        $data = array(
            'Nama_anggota'=> $Nama_anggota,
            'Username_anggota'  => $Username_anggota,
            'Password_anggota'=> $Password_anggota,
            'Alamat'  => $Alamat,
            'No_telp'=> $No_telp,
            'Jenis_kelamin'  => $Jenis_kelamin
        );

        $update = $this->MPemohon_kredit->update_dataAnggota( $Id_anggota, $data);
        if ($update > 0){
            redirect('Bendahara/Data_anggota');
        }

    }
    public function hapus_dataAnggota($Id_anggota)
    {
        $this->MPemohon_kredit->delete_dataAnggota($Id_anggota);
        redirect('Bendahara/Data_anggota');
    }
}

?>