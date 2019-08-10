<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
            $this->load->view('bendahara/body/dashboard');
        } else{
            redirect(base_url(). "Login_pengurus");
        }

    }
}

?>