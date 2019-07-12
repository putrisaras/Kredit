<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_rekomendasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MPengajuan_kredit', 'pengajuan');
        $this->load->model('MRekomendasi_pengajuan');
    }

    public function index($id_rekomendasi)
    {
        $data['pengajuan_kredit'] = $this->pengajuan->getAllPengajuanRekomendasi($id_rekomendasi);
        $this->load->view('bendahara/body/detail_rekomendasi', $data);
    }

}

?>