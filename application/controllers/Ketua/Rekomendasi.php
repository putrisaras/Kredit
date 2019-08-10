<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MRekomendasi_pengajuan');
        $this->load->model('MStatus_persetujuan');
        $this->load->model('MAnggota', 'anggota');
        $this->load->model('MPengajuan_kredit', 'pengajuan');
    }
    public function index(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 1) {
        $this->MRekomendasi_pengajuan->refresh();
        $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_Rekomendasi();
        $this->load->view('ketua/body/rekomendasi',$rekomendasi_pengaju_kredit);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_persetujuan($id_rekomendasi)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 1) {
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
                'notif_persetujuan' => "0",
                'notif_anggota' => "0"
            );

            if ($d->status) {
                $data['id_persetujuan'] = 2;

                $value = $this->pengajuan->getPengajuanKreditByAnggota($d->anggota);

                foreach ($value->result() as $data){
                    $jml_kredit = $data->jml_kredit;
                    $lama_angsuran = $data->lama_angsuran;
                    $this->pengajuan->jumlahkanTotalPinjaman($jml_kredit, $lama_angsuran, $d->anggota);
                }
            } else {
                $data['id_persetujuan'] = 3;

            }

            $this->pengajuan->updateDataPengajuan($d->id, $data);

            $anggota = $this->pengajuan->cariAnggota($d->anggota);
            $result  = $anggota->result();
            $email   = $result[0]->email_anggota;


            //send email
            $this->load->library('email');
            $config = array();
            $config['protocol']  = 'smtp';
            $config['smtp_host'] = 'smtp.hostinger.co.id';
            $config['smtp_user'] = 'tugasakhir.mi@rishamitha.com';
            $config['smtp_pass'] = 'Jsli6iiZTXk3';
            $config['smtp_port'] = 587;
            $this->email->initialize($config);

            $this->email->from('tugasakhir.mi@rishamitha.com', 'Koperasi Jnana Partha');
            $this->email->to($email);
            $this->email->subject('Halo, ada persetujuan pengajuan baru');
            $this->email->message('Silahkan cek website Koperasi Jnana Partha untuk melihat persetujuan pengajuan baru');
            $this->email->send(FALSE);
        }

        //cari bendahara
        $data   = $this->pengajuan->emailBendahara($this->session->userdata('id_pengurus'));
        $result = $data->result();
        $email_pengurus = $result[0]->email_pengurus;
        //load email
        $this->load->library('email');
        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.hostinger.co.id';
        $config['smtp_user'] = 'tugasakhir.mi@rishamitha.com';
        $config['smtp_pass'] = 'Jsli6iiZTXk3';
        $config['smtp_port'] = 587;
        $this->email->initialize($config);

        $this->email->from('tugasakhir.mi@rishamitha.com', 'Koperasi Jnana Partha');
        $this->email->to($email_pengurus);
        $this->email->subject('Halo, ada persetujuan rekomendasi baru');
        $this->email->message('Silahkan cek website Koperasi Jnana Partha untuk melihat persetujuan rekomendasi baru');
        $this->email->send(FALSE);
        //send


        redirect(base_url() . "Ketua/Rekomendasi/v_historyPersetujuan");
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
    public function notif_setuju (){
        $notif_setuju = $this->MRekomendasi_pengajuan->notif_setuju();
        echo json_encode($notif_setuju);
    }

    public function v_historyPersetujuan(){
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 1) {
            $rekomendasi_pengaju_kredit['sql1'] = $this->MRekomendasi_pengajuan->read_historyRekomendasi();
            $this->load->view('ketua/body/history_persetujuan',$rekomendasi_pengaju_kredit);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
    public function v_detailPersetujuan($id_rekomendasi)
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 1) {
            $data['pengajuan_kredit'] = $this->pengajuan->getHitoryPersetujuan($id_rekomendasi);
            $data['anggota'] = $this->anggota->read_dataAnggota();
            $this->load->view('ketua/body/detail_persetujuan', $data);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }
}

?>