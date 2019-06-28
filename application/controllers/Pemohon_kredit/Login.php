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
        if ($this->session->userdata('kondisi') == "Berhasil Login") {
            redirect(base_url() . "pemohon_kredit/dashboard/index");
        } else {
            $data['halaman'] = "login";
            $this->load->view('pemohon_kredit/body/login_anggota', $data);
        }
    }

    public function login()
    {
        $username_anggota = $this->input->post('username_anggota');
        $password_anggota = $this->input->post('password_anggota');

        $loginAnggota = $this->pemohon->loginAnggota($username_anggota, $password_anggota);
        $result = $loginAnggota->num_rows();

        if ($result > 0) {
            $status = "Berhasil Login";
            foreach ($loginAnggota->result() as $data) {
                $session_data = array(
                    'id_anggota' => $data->id_anggota,
                    'nama_anggota' => $data->nama_anggota,
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
        $session_data = array(
            'id_anggota', 'nama_anggota', 'kondisi'
        );

        $this->session->unset_userdata($session_data);
        redirect(base_url() . 'Pemohon_kredit/login/index');
    }
}
?>