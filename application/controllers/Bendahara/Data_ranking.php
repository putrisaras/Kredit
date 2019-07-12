<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ranking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
        $this->load->model('MRekomendasi_pengajuan');
    }

    public function index($id_spk)
    {
        $data['pengajuan_kredit'] = $this->pengajuan->getAllPengajuan($id_spk);
        $data['anggota'] = $this->anggota->read_dataAnggota();
        $this->load->view('bendahara/body/data_ranking', $data);
    }

    public function rekomendasi()
    {
        $ids = $this->input->post('ids');
        $ids = explode(',', $ids);
        $id_rekomendasi = date("YmdHis");

            $data = array(
                'id_rekomendasi' => $id_rekomendasi
            );

            foreach ($ids as $id) {
                $this->pengajuan->updateDataPengajuan($id, $data);
            }
            $this->MRekomendasi_pengajuan->insertRekomendasi($id_rekomendasi);
          redirect(base_url() . "Bendahara/Data_spk/index");


    }
}

?>