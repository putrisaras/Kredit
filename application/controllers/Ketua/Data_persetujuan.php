<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_persetujuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
    }

    public function index($id_rekomendasi)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $data['pengajuan_kredit'] = $this->pengajuan->getAllPersetujuan($id_rekomendasi);
        $data['anggota'] = $this->anggota->read_dataAnggota();
        $this->load->view('ketua/body/data_persetujuan', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
}

?>