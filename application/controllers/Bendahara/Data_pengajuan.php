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
        $this->load->model('MPemohon_kredit', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
    }

    public function index()
    {
        $data['pengajuan_kredit'] = $this->pengajuan->getAllPengajuan();
        $data['pemohon_kredit'] = $this->anggota->read_dataPemohon_kredit();
        $this->load->view('bendahara/body/data_pengajuan', $data);
    }

    public function tambah_dataPengajuan()
    {
        $id_anggota = $this->input->post('nama_anggota');
        $tgl_pengajuan= $this->input->post('tgl_pengajuan');
        $jml_kredit= $this->input->post('jml_kredit');
        $lama_angsuran= $this->input->post('lama_angsuran');
        $sisa_utang_di_tempat_lain= $this->input->post('sisa_utang_di_tempat_lain');
        $data = array(
            'tgl_pengajuan' => date('y-m-d'),
            'jml_kredit' => $jml_kredit,
            'id_anggota' =>$id_anggota,
            'lama_angsuran' =>$lama_angsuran,
            'sisa_utang_di_tempat_lain' =>$sisa_utang_di_tempat_lain,
            'id_kelayakan' =>"1",
            'id_pengurus' => "2"
        );
        $insert = $this->pengajuan->tambahPengajuan($data);
        if ($insert > 0){
            echo "Berhasil";
            redirect(base_url() . "Bendahara/Data_pengajuan/index");
        } else {
            echo "Gagal";
        }

    }
    public function edit_dataPengajuan($id_pengajuan)
    {
        $jml_kredit = $this->input->post('jml_kredit');
        $lama_angsuran = $this->input->post('lama_angsuran');
        $sisa_utang_di_tempat_lain = $this->input->post('sisa_utang_di_tempat_lain');

        $data = array(
            'jml_kredit'=> $jml_kredit,
            'lama_angsuran'  => $lama_angsuran,
            'sisa_utang_di_tempat_lain'=> $sisa_utang_di_tempat_lain
        );

        $update = $this->pengajuan->update_dataPengajuan( $id_pengajuan, $data);
        if ($update > 0){
            redirect('Bendahara/Data_pengajuan');
        }

    }
    public function hapus_dataPengajuan($id_pengajuan)
    {
        $this->pengajuan->delete_dataPengajuan($id_pengajuan);
        redirect('Bendahara/Data_pengajuan');
    }
}

?>