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
        $this->load->model('MPengurus_koperasi', 'pengurus');
    }

    public function index()
    {
        $this->load->view('bendahara/body/login_pengurus');
    }

    public function login()
    {
        $Username_pengurus = $this->input->post('Username_pengurus');
        $Password_pengurus = $this->input->post('Password_pengurus');

        $loginPengurus = $this->pengurus->loginPengurus($Username_pengurus, $Password_pengurus);
        $result = $loginPengurus->num_rows();

        if ($result > 0) {
            $status = "Berhasil Login";
            foreach ($loginPengurus->result() as $data) {
                $session_data = array(
                    'Id_pengurus' => $data->Id_pengurus,
                    'Nama_pengurus' => $data->Nama_pengurus,
                    'kondisi' => $status
                );
                $this->session->set_userdata($session_data);
            }
            redirect(base_url() . "Bendahara/Dasboard/index");
        } else {

            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . "Bendahara/Login/index");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'Bendahara/login/index');
    }
}
?>