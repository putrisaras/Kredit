<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_kredit extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
    }
    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $data['halaman'] = "pengajuan_kredit";
            $data['pengajuan_kredit'] = $this->pengajuan->getPengajuanById($this->session->userdata('id_anggota'));
            $this->load->view('pemohon_kredit/body/pengajuan_kredit', $data);
        } else {
            redirect(base_url() . 'pemohon_kredit/Login/index');
        }
    }
    public function tambah_Pengajuan()
    {
        $id_anggota = $this->session->userdata('id_anggota');
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
            redirect(base_url() . "Pemohon_kredit/Pengajuan_kredit/index");
        } else {
            echo "Gagal";
        }

    }
    public function edit_Pengajuan($id_pengajuan)
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
            redirect('Pemohon_kredit/Pengajuan_kredit');
        }
    }
    public function hapus_Pengajuan($id_pengajuan)
    {
        $this->pengajuan->delete_dataPengajuan($id_pengajuan);
        redirect('Pemohon_kredit/Pengajuan_kredit');
    }
}

?>