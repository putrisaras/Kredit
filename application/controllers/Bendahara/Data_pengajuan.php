<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_pengajuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
        $this->load->model('MSpk');
        $this->load->model('MStatus_kelayakan', 'status_kelayakan');
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login') {
            $this->pengajuan->refresh();
            $data['pengajuan_kredit'] = $this->pengajuan->getPengajuan();
            $anngota = $this->anggota->fetchAnggota();
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('bendahara/body/data_pengajuan', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }

//    public function tambah_dataPengajuan()
//    {
//        $id_pengurus = $this->session->userdata('id_pengurus');
//        $id_anggota = $this->input->post('nama_anggota');
//        $tgl_pengajuan = $this->input->post('tgl_pengajuan');
//        $jml_kredit = $this->input->post('jml_kredit');
//        $lama_angsuran = $this->input->post('lama_angsuran');
//        $sisa_utang_di_tempat_lain = $this->input->post('sisa_utang_di_tempat_lain');
//        $data = array(
//            'tgl_pengajuan' => date('y-m-d'),
//            'jml_kredit' => $jml_kredit,
//            'id_anggota' => $id_anggota,
//            'lama_angsuran' => $lama_angsuran,
//            'sisa_utang_di_tempat_lain' => $sisa_utang_di_tempat_lain,
//            'id_kelayakan' => "1",
//            'id_pengurus' => $id_pengurus
//        );
//        $insert = $this->pengajuan->tambah_dataPengajuan($data);
//        if ($insert > 0) {
//            $this->session->set_flashdata('pesan', 'berhasil');
//            redirect(base_url() . "Bendahara/Data_pengajuan/index");
//        } else {
//            $this->session->set_flashdata('pesan', 'gagal');
//            redirect(base_url() . "Bendahara/Data_pengajuan/index");
//        }
//
//    }
//
//    public function edit_dataPengajuan($id_pengajuan)
//    {
//        $jml_kredit = $this->input->post('jml_kredit');
//        $lama_angsuran = $this->input->post('lama_angsuran');
//        $sisa_utang_di_tempat_lain = $this->input->post('sisa_utang_di_tempat_lain');
//
//        $data = array(
//            'jml_kredit' => $jml_kredit,
//            'lama_angsuran' => $lama_angsuran,
//            'sisa_utang_di_tempat_lain' => $sisa_utang_di_tempat_lain
//        );
//
//        $update = $this->pengajuan->update_dataPengajuan($id_pengajuan, $data);
//        if ($update > 0) {
//            $this->session->set_flashdata('pesan', 'updated');
//            redirect('Bendahara/Data_pengajuan');
//        }
//        else {
//            $this->session->set_flashdata('pesan', 'failure');
//            redirect('Bendahara/Data_pengajuan');
//        }
//
//    }
//
//    public function hapus_dataPengajuan()
//    {
//        $id_pengajuan = $this->input->post('id_pengajuan');
//        $this->pengajuan->delete_dataPengajuan($id_pengajuan);
//        redirect('Bendahara/Data_pengajuan');
//    }

    public function hitungSPK()
    {
        $pengajuanKredit = $this->pengajuan->getAllPengajuan();
        $nilaiMaxMin = $this->pengajuan->getPengajuanKredit();
        $insertId =date("YmdHis");
        $insert = $this->MSpk->insertDataSPK($insertId);
        if ($insert > 0) {
            foreach ($pengajuanKredit->result() as $item) {
                foreach ($nilaiMaxMin->result() as $data) {
                    $jml_modal = $data->jml_modal;
                    $jml_kredit = $data->jml_kredit;
                    $lama_angsuran = $data->lama_angsuran;
                    $jml_gaji = $data->jml_gaji;
                    $sisaUtangKoprasi = $data->sisa_utangKoprasi;
                    $sisaUtangDiTempatLain = $data->sisa_utang;
                }
                $normalisasiModal = $item->jml_modal / $jml_modal;
                $normalsasiKredit = $jml_kredit / $item->jml_kredit;
                $normalisasiAngsuran = $lama_angsuran / $item->lama_angsuran;
                $normalisasiJumlahGaji = $item->jml_gaji / $jml_gaji;
                $normalisasiSisaUtangKoperasi = $sisaUtangKoprasi / $item->sisa_utang_di_koperasi;
                $normalisasiSisaUtangDiTempatLain = $sisaUtangDiTempatLain / $item->sisa_utang_di_tempat_lain;
                $preferensi=($normalisasiModal*0.25)+($normalsasiKredit*0.20)+($normalisasiAngsuran*0.10)+($normalisasiJumlahGaji*0.15)+($normalisasiSisaUtangKoperasi*0.15)+($normalisasiSisaUtangDiTempatLain*0.15);

                $status_kelayakan = $this->status_kelayakan->getKelayakan($preferensi);

                $id_persetujuan = "0";
                foreach ($status_kelayakan->result()as $value){
                    $status_kelayakan_kredit = $value->id_kelayakan;
                    if ($status_kelayakan_kredit == 1){
                        $id_persetujuan = "3";
                    }
                }
                $data = array(
                    'n_modal' => round($normalisasiModal, 2),
                    'n_kredit' => round($normalsasiKredit, 2),
                    'n_lama_angsuran' => round($normalisasiAngsuran, 2),
                    'n_gaji' => round($normalisasiJumlahGaji, 2),
                    'n_utang_koperasi' => round($normalisasiSisaUtangKoperasi, 2),
                    'n_utang_lain' => round($normalisasiSisaUtangDiTempatLain, 2),
                    'nilai_preferensi' => round($preferensi, 2),
                    'id_kelayakan' => $status_kelayakan_kredit,
                    'id_persetujuan' => $id_persetujuan,
                    'id_spk' => $insertId
                );

                $update = $this->pengajuan->updateDataPengajuan($item->id_pengajuan, $data);

            }
            if ($update > 0) {
                redirect(base_url() . "Bendahara/Data_ranking/index");
            } else {

            }
        } else {
            redirect(base_url() . "Bendahara/Data_Pengajuan/index");
        }

    }

    public function notif (){
        $notif = $this->pengajuan->notif();
        echo json_encode($notif);
    }
}

?>