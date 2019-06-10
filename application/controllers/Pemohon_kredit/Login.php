<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPemohon_kredit', 'pemohon');
    }

    public function index()
    {
        $this->load->view('pemohon_kredit/body/login_anggota');
    }

    public function login()
    {
        $Username_anggota = $this->input->post('Username_anggota');
        $Password_anggota = $this->input->post('Password_anggota');

        $loginAnggota = $this->pemohon->loginAnggota($Username_anggota, $Password_anggota);
        $result = $loginAnggota->num_rows();

        if ($result > 0) {
            $status = "Berhasil Login";
            foreach ($loginAnggota->result() as $data) {
                $session_data = array(
                    'Id_anggota' => $data->Id_anggota,
                    'Nama_anggota' => $data->Nama_anggota,
                    'kondisi' => $status
                );
                $this->session->set_userdata($session_data);
            }
            redirect(base_url() . "Pemohon_kredit/Dashboard/index");
        } else {

            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . "Pemohon_kredit/Login/index");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'Pemohon_kredit/login/index');
    }
}
?>