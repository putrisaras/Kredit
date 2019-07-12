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
        $this->load->model("MAnggota");
    }

    public function index(){
        $anggota['sql1'] = $this->MAnggota->read_dataAnggota();
        $this->load->view('bendahara/body/data_anggota', $anggota);
    }
    public function tambah_dataAnggota()
    {
        $data = array(

            'nama_anggota'=> $this->input->post('nama_anggota'),
            'username_anggota'  => $this->input->post('username_anggota'),
            'password_anggota'=> $this->input->post('password_anggota'),
            'jml_gaji'=>  $this->input->post('jml_gaji'),
            'alamat'  => $this->input->post('alamat'),
            'no_telp'=> $this->input->post('no_telp'),
            'jml_modal' => '150000',
            'jenis_kelamin'  => $this->input->post('jenis_kelamin')
        );

        $this->MAnggota->create_dataAnggota($data);
        redirect('Bendahara/Data_anggota');
    }
    public function edit_dataAnggota($id_anggota)
    {
        $nama_anggota = $this->input->post('nama_anggota');
        $username_anggota = $this->input->post('username_anggota');
        $password_anggota = $this->input->post('password_anggota');
        $alamat = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $jenis_kelamin = $this->input->post('jenis_kelamin');

        $data = array(
            'nama_anggota'=> $nama_anggota,
            'username_anggota'  => $username_anggota,
            'password_anggota'=> $password_anggota,
            'alamat'  => $alamat,
            'no_telp'=> $no_telp,
            'jenis_kelamin'  => $jenis_kelamin
        );

        $update = $this->MAnggota->update_dataAnggota( $id_anggota, $data);
        if ($update > 0){
            redirect('Bendahara/Data_anggota');
        }

    }
    public function hapus_dataAnggota($id_anggota)
    {
        $this->MAnggota->delete_dataAnggota($id_anggota);
        redirect('Bendahara/Data_anggota');
    }
}

?>