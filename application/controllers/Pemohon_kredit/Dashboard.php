<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MAnggota", 'anggota');
    }

    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login')
        {
            $data['halaman'] = "dashboard";
            $this->load->view('pemohon_kredit/body/dashboard');
        }
        else {
            redirect(base_url() . 'pemohon_kredit/Login/index');
        }
    }
    public function v_profil()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['halaman'] = "my_profil";
            $data['anggota'] = $this->anggota->getProfilById($this->session->userdata('id_anggota'));
            $this->load->view('pemohon_kredit/body/my_profil', $data);
        } else {
            redirect(base_url() . 'pemohon_kredit/Login/index');
        }
    }
    public function edit_Profil($id_anggota)
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

        $update = $this->anggota->update_Profil( $id_anggota, $data);
        if ($update > 0){
            $this->session->set_flashdata('pesan', 'updated');
            redirect('Pemohon_kredit/Dashboard/v_profil');
        }
        else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect('Pemohon_kredit/Dashboard/v_profil');
        }
    }
}
?>