<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/9/2018
 * Time: 11:20 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_modal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("MAnggota");
    }

    public function index()
    {
        if ($this->session->userdata('kondisi') == 'Berhasil Login' && $this->session->userdata('Level') == 2) {
            $anggota['sql1'] = $this->MAnggota->read_dataAnggota();
            $this->load->view('bendahara/body/data_modal', $anggota);
        } else {
            redirect(base_url() . 'Login_pengurus/index');
        }
    }

    public function edit_dataModal($id_anggota)
    {
        $nama_anggota = $this->input->post('nama_anggota');
        $jml_modal = $this->input->post('jml_modal');

        $data = array(
            'nama_anggota' => $nama_anggota,
            'jml_modal' => $jml_modal
        );

        $update = $this->MAnggota->update_dataModal($id_anggota, $data);
        if ($update > 0) {
            $this->session->set_flashdata('pesan', 'updated');
            redirect('Bendahara/Data_modal');
        } else {
            $this->session->set_flashdata('pesan', 'failure');
            redirect('Bendahara/Data_modal');
        }

    }

//    public function export()
//    {
//        include APPPATH . 'third_party\PHPExcel\PHPExcel\PHPExcel.php';
//        $excel = new PHPExcel();
//
//        $excel->getProperties()->setCreator('Koperasi Jnana Partha')
//            ->setLastModifiedBy('Koperasi Jnana Partha')
//            ->setTitle("Data Modal")
//            ->setSubject("Anggota")
//            ->setDescription("Laporan data modal")
//            ->setKeywords("Data Modal");
//        $style_col = array(
//            'font' => array('bold' => true),
//            'alignment' => array(
//                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
//                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
//            ),
//            'borders' => array(
//                'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
//                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
//                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
//                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
//            ));
//        $style_row = array(
//            'alignment' => array(
//                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
//            ),
//            'borders' => array(
//                'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
//                'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
//                'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
//                'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
//            ));
//        $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MODAL");
//        $excel->getActiveSheet()->mergeCells('A1:d1');
//        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
//        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
//
//        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//
//        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
//        $excel->setActiveSheetIndex(0)->setCellValue('B3', "ID ANGGOTA");
//        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA ANGGOTA");
//        $excel->setActiveSheetIndex(0)->setCellValue('D3', "JUMLAH MODAL");
//
//        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
//        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
//        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
//        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
//
//        $sql1 = $this->MAnggota->read_dataAnggota();
//        $no = 1;
//        $numrow = 4;
//        foreach ($sql1->result() as $anggota) {
//            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
//            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $anggota->id_anggota);
//            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $anggota->nama_anggota);
//            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, "Rp. ". number_format($anggota->jml_modal,0,".","."));
//
//            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
//            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
//            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
//            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
//
//            $no++;
//            $numrow++;
//        }
//        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
//        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
//        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
//        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
//
//        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
//        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
//
//        $excel->getActiveSheet(0)->setTitle("Laporan Data Modal");
//        $excel->setActiveSheetIndex(0);
//
//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment; filename="Data Modal.xlsx"');
//        header('Cache-Control: max-age=0');
//
//        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
//        $write->save('php://output');
//    }

}

?>