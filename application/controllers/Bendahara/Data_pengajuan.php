<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pengajuan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MPengajuan_kredit");
    }

    public function index(){
        $pengajuan_kredit['sql1'] = $this->MPengajuan_kredit->read_dataPengajuan_kredit();
        $this->load->view('bendahara/body/data_pengajuan', $pengajuan_kredit);
    }
}

?>