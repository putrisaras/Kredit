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
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
        $data['pengajuan_kredit'] = $this->pengajuan->getAllPengajuan($id_spk);
        $data['anggota'] = $this->anggota->read_dataAnggota();
        $this->load->view('bendahara/body/data_ranking', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }

    public function updateRekomendasi()
    {
        $data = $this->input->post('ids');
        $data = json_decode($data);

        $id_rekomendasi = date("YmdHis");

            foreach ($data as $d) {
                $data = array(
                    'id_rekomendasi' => $id_rekomendasi,
                    'id_persetujuan' => "1",
                    'ranking'        => $d->rank,
                );

                $this->pengajuan->updateDataPengajuan($d->id, $data);
            }

            $this->MRekomendasi_pengajuan->insertRekomendasi($id_rekomendasi);

            redirect(base_url() . "Bendahara/Data_rekomendasi/index");


    }
}

?>