<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_spk extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSpk');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $spk['sql1'] = $this->MSpk->read_dataSpk();
        $this->load->view('bendahara/body/data_spk', $spk);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
}

?>