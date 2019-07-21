<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_pengurus extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPengurus_koperasi', 'pengurus');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == "Berhasil Login") {
            redirect(base_url() . "bendahara/dashboard/index");
        } else {
            $data['halaman'] = "login";
            $this->load->view('login_pengurus', $data);
        }
    }

    public function login()
    {
        $username_pengurus = $this->input->post('username_pengurus');
        $password_pengurus = $this->input->post('password_pengurus');

        $loginPengurus = $this->pengurus->loginPengurus($username_pengurus, $password_pengurus);
        $result = $loginPengurus->num_rows();


        if ($result > 0) {
            $status = "Berhasil Login";
            $level = 0;
            foreach ($loginPengurus->result() as $data) {
                if ($data->jabatan == "Ketua") {
                    $level = 1;
                    $session_data = array(
                        'id_pengurus' => $data->id_pengurus,
                        'nama_pengurus' => $data->nama_pengurus,
                        'jabatan' => $data->jabatan,
                        'Level' => $level,
                        'kondisi' => $status
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url() . "Ketua/Dashboard/index");
                } else if ($data->jabatan == "Bendahara") {
                    $level = 2;
                    $session_data = array(
                        'id_pengurus' => $data->id_pengurus,
                        'nama_pengurus' => $data->nama_pengurus,
                        'jabatan' => $data->jabatan,
                        'Level' => $level,
                        'kondisi' => $status
                    );
                    $this->session->set_userdata($session_data);
                    redirect(base_url() . "Bendahara/Dashboard/index");
                }

            }

        } else {
            $this->session->set_flashdata('error', 'Invalid Username or Password');
            redirect(base_url() . "Login_pengurus/index");
        }
    }

    public function logout()
    {
        $session_data = array(
            'id_pengurus', 'nama_pengurus', 'jabatan','kondisi'
        );

        $this->session->unset_userdata($session_data);
        redirect(base_url() . 'home/index');
    }
}

?>