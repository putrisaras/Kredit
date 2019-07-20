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
    public function persetujuan()
    {
        $data = $this->input->post('ids');
        $data = json_decode($data);
        $id_persetujuan = 'id_persetujuan' ;

        foreach ($data as $d) {
            $data = array(
                'id_persetujuan' => $id_persetujuan,
            );

            if ($d->status) {
                $data['id_persetujuan'] = 2;
            } else {
                $data['id_persetujuan'] = 3;
            }

            $this->pengajuan->updateDataPengajuan($d->id, $data);
        }

        redirect(base_url() . "Ketua/Rekomendasi/index");
    }
    public function tampildata()
    {
        $id_pengajuan = $this->input->post('id_pengajuan');
        $persetujuan = $this->input->post('persetujuan');
        $coba = 0;
        foreach($persetujuan as $key => $val ) {
            if (isset($val)){
                echo $val;
            } else {
                echo "0 ";
            }

            echo "<br>";

        }

    }
}

?>